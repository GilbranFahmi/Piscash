<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // <── WAJIB DITAMBAHKAN

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $query = Transaksi::where('kasir_id', $kasirId)->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $query->where('kode_qr', 'LIKE', '%' . $request->search . '%');
        }

        $riwayat = $query->get();

        return view('riwayat.riwayat', compact('riwayat'));
    }

    public function detail($id)
    {
        $t = Transaksi::with('detailTransaksis.produk')->findOrFail($id);

        return response()->json([
            'id' => $t->kode_qr, // pakai kode transaksi TRX-xxxx
            'tanggal' => $t->created_at->format('Y-m-d'),
            'waktu' => $t->created_at->format('H:i'),
            'total_harga' => $t->total_harga,
            'jumlah_bayar' => $t->jumlah_bayar,
            'kembalian' => $t->kembalian,
            'detail_transaksis' => $t->detailTransaksis,
        ]);
    }
}
