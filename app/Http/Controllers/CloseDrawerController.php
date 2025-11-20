<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\OpenDrawer;
use App\Models\CloseDrawer;
use App\Models\Transaksi;
use App\Models\Kasir;
use Carbon\Carbon;

class CloseDrawerController extends Controller
{
    public function index()
    {
       
        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $kasir = Kasir::find($kasirId);
        if (!$kasir) {
            return redirect('/login')->with('error', 'Kasir tidak ditemukan.');
        }

        
        $drawer = OpenDrawer::where('kasir_id', $kasirId)
            ->orderBy('waktu_buka', 'desc')
            ->first();

        
        $saldo_awal = $drawer->saldo_awal ?? 0;
        $waktu_buka = $drawer->waktu_buka ?? null;

        
        $transaksi = collect();
        $total_masuk = 0;

        if ($drawer) {
            $transaksi = Transaksi::with('kasir')
                ->where('kasir_id', $kasirId)
                ->where('created_at', '>=', $drawer->waktu_buka)
                ->orderBy('created_at', 'asc')
                ->get();

            $total_masuk = $transaksi->sum('total_harga');
        }

        $closeList = CloseDrawer::where('kasir_id', $kasirId)
            ->orderBy('waktu_tutup', 'desc')
            ->get();

        return view('close-drawer', compact(
            'kasir', 'drawer', 'waktu_buka',
            'saldo_awal', 'transaksi', 'total_masuk', 'closeList'
        ));
    }

    public function store(Request $request)
    {
        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'uang_keluar' => 'nullable|numeric|min:0',
        ]);

        $uang_keluar = $request->input('uang_keluar', 0);

 
        $drawer = OpenDrawer::where('kasir_id', $kasirId)
            ->orderBy('waktu_buka', 'desc')
            ->first();

        if (!$drawer) {
            return redirect()->back()->with('error', 'Tidak ada open drawer aktif untuk kasir ini.');
        }

        
        $total_masuk = Transaksi::where('kasir_id', $kasirId)
            ->where('created_at', '>=', $drawer->waktu_buka)
            ->sum('total_harga');

        $saldo_awal = $drawer->saldo_awal ?? 0;
        $saldo_akhir = $saldo_awal + $total_masuk - $uang_keluar;

    
        CloseDrawer::create([
    'kasir_id'   => $kasirId,
    'waktu_tutup'=> now(),
    'saldo_awal' => $saldo_awal,
    'saldo_akhir'=> $saldo_akhir,
]);
    

        $drawer->delete();

        return redirect()->route('close-drawer.index')
            ->with('success', 'Drawer berhasil ditutup! Saldo akhir: Rp ' . number_format($saldo_akhir,0,',','.'));
    }
}
