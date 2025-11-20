<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{

    public function index()
    {
        $riwayat = Transaksi::orderBy('created_at', 'desc')->get();

        return view('riwayat', compact('riwayat'));
    }

   public function detail($id)
{
    $t = Transaksi::with('detailTransaksis.produk')->findOrFail($id);

    return response()->json([
        'id' => $t->id,
        'tanggal' => $t->created_at->format('Y-m-d'),
        'waktu' => $t->created_at->format('H:i'),
        'total_harga' => $t->total_harga,
        'jumlah_bayar' => $t->jumlah_bayar,
        'kembalian' => $t->kembalian,
        'detail_transaksis' => $t->detailTransaksis,
    ]);
}
}
