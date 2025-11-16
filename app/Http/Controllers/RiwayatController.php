<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    // halaman utama
    public function index()
    {
        $riwayat = Transaksi::orderBy('created_at', 'desc')->get();

        return view('riwayat', compact('riwayat'));
    }

    // detail transaksi untuk modal (AJAX)
    public function detail($id)
    {
        $transaksi = Transaksi::with('detailTransaksis.produk')->findOrFail($id);

        return response()->json($transaksi);
    }
}
