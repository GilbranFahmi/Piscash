<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
        // Validasi input
        $request->validate([
            'produk_id' => 'required|array',
            'jumlah' => 'required|array',
            'subtotal' => 'required|array',
            'total' => 'required|numeric|min:0',
            'jumlah_bayar' => 'nullable|numeric|min:0'
        ]);

        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Anda harus login sebagai kasir.');
        }

        // ✅ Cek stok setiap produk sebelum transaksi
        foreach ($request->produk_id as $index => $produkId) {
            $produk = Produk::find($produkId);
            $jumlah = $request->jumlah[$index];

            if (!$produk) {
                return back()->with('error', "Produk dengan ID {$produkId} tidak ditemukan.");
            }

            if ($produk->stok < $jumlah) {
                return back()->with('error', "Stok produk '{$produk->nama_produk}' tidak mencukupi. Stok tersisa: {$produk->stok}");
            }
        }

        // ✅ Cek apakah uang bayar cukup
        $total = $request->total;
        $bayar = $request->jumlah_bayar ?? 0;

        if ($bayar < $total) {
            return back()->with('error', 'Uang yang dibayarkan kurang dari total harga.');
        }

        // Jalankan transaksi database
        DB::beginTransaction();
        try {
            // Simpan transaksi utama
            $transaksi = Transaksi::create([
                'kasir_id' => $kasirId,
                'kode_qr' => uniqid('TRX-'),
                'total_harga' => $total,
                'jumlah_bayar' => $bayar,
                'kembalian' => $bayar - $total,
            ]);

            // Simpan produk yang dibeli + update stok
            foreach ($request->produk_id as $index => $produkId) {
                $produk = Produk::find($produkId);
                $jumlah = $request->jumlah[$index];

                $produk->stok -= $jumlah;
                $produk->save();

                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $produkId,
                    'jumlah' => $jumlah,
                    'subtotal' => $request->subtotal[$index],
                ]);
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

            DB::commit();

            return redirect()->route('struk.show', $transaksi->id)->with('success', 'Transaksi berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan transaksi: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan struk transaksi
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('detailTransaksis.produk')->findOrFail($id);

        // Ambil metode pembayaran dari session
        $metodeData = Session::get('metode_pembayaran', ['split' => false, 'metode' => 'Tunai']);

        // Format teks metode pembayaran
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
