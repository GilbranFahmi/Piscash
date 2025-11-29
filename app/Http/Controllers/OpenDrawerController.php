<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\OpenDrawer;
use App\Models\Transaksi;
use App\Models\Kasir;
use Carbon\Carbon;

class OpenDrawerController extends Controller
{
    public function index()
    {
        $kasirId = Session::get('kasir_id');
        $kasir = Kasir::find($kasirId);

        if (!$kasir) {
            return redirect('/login')->with('error', 'Sesi kasir tidak ditemukan!');
        }

        // Ambil drawer terakhir dari kasir ini
        $drawer = OpenDrawer::where('kasir_id', $kasirId)
            ->orderBy('waktu_buka', 'desc')
            ->first();

        // Default transaksi kosong
        $transaksi = collect();

        // Jika drawer ada, ambil transaksi setelah waktu buka drawer
        if ($drawer) {
            $transaksi = Transaksi::where('kasir_id', $kasirId)
                ->where('created_at', '>=', $drawer->waktu_buka)
                ->orderBy('created_at', 'asc')
                ->get();
        }

        // Tentukan status drawer
        $status = $drawer ? 'Aktif' : 'Tidak Aktif';

        return view('drawer.open-drawer', [
            'kasir' => $kasir,
            'waktu_buka' => $drawer->waktu_buka ?? null,
            'saldo_awal' => $drawer->saldo_awal ?? 0,
            'transaksi' => $transaksi,
            'status' => $status
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'saldo_awal' => 'required|numeric|min:0'
        ]);

        $kasirId = Session::get('kasir_id');

        // Buat drawer baru
        OpenDrawer::create([
            'kasir_id' => $kasirId,
            'waktu_buka' => Carbon::now(),
            'saldo_awal' => $request->saldo_awal,
        ]);

        return redirect()->route('open-drawer.index')->with('success', 'Drawer berhasil dibuka!');
    }
}
