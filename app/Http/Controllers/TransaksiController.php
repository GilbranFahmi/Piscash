<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    /**
     * Tampilkan halaman transaksi
     */
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        $kategori = KategoriProduk::all();

        return view('transaksi', compact('produks', 'kategori'));
    }

    /**
     * Simpan transaksi ke database (mendukung multi-produk & split bill)
     */
    public function store(Request $request)
    {
        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Anda harus login sebagai kasir.');
        }

        // Simpan transaksi utama
        $transaksi = Transaksi::create([
            'kasir_id' => $kasirId,
            'kode_qr' => uniqid('TRX-'),
            'total_harga' => $request->total,
        ]);

        // Cek apakah ada item produk
        if ($request->has('produk_id')) {
            foreach ($request->produk_id as $index => $produkId) {
                $produk = Produk::find($produkId);

                if ($produk) {
                    $jumlah = $request->jumlah[$index];

                    // Kurangi stok produk (tanpa minus)
                    $produk->stok = max(0, $produk->stok - $jumlah);
                    $produk->save();

                    // Simpan detail transaksi
                    DetailTransaksi::create([
                        'transaksi_id' => $transaksi->id,
                        'produk_id' => $produkId,
                        'jumlah' => $jumlah,
                        'subtotal' => $request->subtotal[$index],
                    ]);
                }
            }
        }

        // Simpan metode pembayaran ke session
        if ($request->has('splitBill') && $request->splitBill == 'on') {
            Session::put('metode_pembayaran', [
                'split' => true,
                'metode1' => $request->metode1 ?? 'Tunai',
                'nominal1' => $request->nominal1 ?? 0,
                'metode2' => $request->metode2 ?? 'Tunai',
                'nominal2' => $request->nominal2 ?? 0,
            ]);
        } else {
            Session::put('metode_pembayaran', [
                'split' => false,
                'metode' => $request->metode ?? 'Tunai',
            ]);
        }

        return redirect()->route('struk.show', $transaksi->id);
    }

    /**
     * Tampilkan struk transaksi
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('detailTransaksis.produk')->findOrFail($id);

        // Ambil metode pembayaran dari session
        $metodeData = Session::get('metode_pembayaran', ['split' => false, 'metode' => 'Tunai']);

        // Konversi ke teks supaya tidak error htmlspecialchars()
        if ($metodeData['split'] ?? false) {
            $metode = 'Split Bill: ' .
                ($metodeData['metode1'] ?? 'Tunai') . ' (Rp' . number_format($metodeData['nominal1'] ?? 0, 0, ',', '.') . ') + ' .
                ($metodeData['metode2'] ?? 'Tunai') . ' (Rp' . number_format($metodeData['nominal2'] ?? 0, 0, ',', '.') . ')';
        } else {
            $metode = $metodeData['metode'] ?? 'Tunai';
        }

        return view('struk', compact('transaksi', 'metode'));
    }
}
