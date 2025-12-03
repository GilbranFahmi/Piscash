<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\OpenDrawer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Silakan login sebagai kasir.');
        }

        $drawer = OpenDrawer::where('kasir_id', $kasirId)->first();
        if (!$drawer) {
            return redirect()->route('open-drawer.index')
                ->with('error', 'Silakan buka drawer terlebih dahulu sebelum melakukan transaksi.');
        }

        $produks = Produk::with('kategori')->get();
        $kategori = KategoriProduk::all();

        return view('transaksi.transaksi', compact('produks', 'kategori'));
    }

    public function searchKode(Request $request)
    {
        $kode = $request->kode;
        $produk = Produk::where('kode_produk', $kode)->first();

        if (!$produk) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        return response()->json($produk);
    }

   public function store(Request $request)
{
    $request->validate([
        'produk_id' => 'required|array',
        'jumlah' => 'required|array',
        'subtotal' => 'required|array',
        'total' => 'required',
        'jumlah_bayar' => 'nullable'
    ]);

    $kasirId = Session::get('kasir_id');
    if (!$kasirId) {
        return redirect('/login')->with('error', 'Anda harus login sebagai kasir.');
    }

    $drawer = OpenDrawer::where('kasir_id', $kasirId)->first();
    if (!$drawer) {
        return redirect()->route('open-drawer.index')
            ->with('error', 'Transaksi gagal! Drawer belum dibuka.');
    }

    // Convert formatted currency to integer (remove . and ,)
    $total = (int) preg_replace('/[^0-9]/', '', $request->total);
    $bayar = (int) preg_replace('/[^0-9]/', '', $request->jumlah_bayar);
    $kembalian = max(0, $bayar - $total);

    // Validasi stok sebelum transaksi
    foreach ($request->produk_id as $i => $produkId) {
        $produk = Produk::find($produkId);
        $jumlah = $request->jumlah[$i];

        if (!$produk)
            return back()->with('error', "Produk tidak ditemukan.");

        if ($produk->stok < $jumlah)
            return back()->with('error', "Stok '{$produk->nama_produk}' tidak mencukupi.");
    }

    // Validasi bayar
    if ($bayar < $total) {
        return back()->with('error', 'Uang yang dibayarkan kurang dari total harga.');
    }

    DB::beginTransaction();
    try {

        $transaksi = Transaksi::create([
            'kasir_id' => $kasirId,
            'kode_qr' => uniqid('TRX-'),
            'total_harga' => $total,
            'jumlah_bayar' => $bayar,
            'kembalian' => $kembalian
        ]);

        foreach ($request->produk_id as $i => $produkId) {

            $produk = Produk::find($produkId);
            $jumlah = $request->jumlah[$i];

            $produk->stok -= $jumlah;
            $produk->save();

            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $produkId,
                'jumlah' => $jumlah,
                'subtotal' => (int) $request->subtotal[$i]
            ]);
        }

        DB::commit();
        return redirect()->route('struk.show', $transaksi->id)
            ->with('success', 'Transaksi berhasil disimpan!');

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Terjadi kesalahan: '.$e->getMessage());
    }
}

    public function show($id)
    {
        $transaksi = Transaksi::with('detailTransaksis.produk')->findOrFail($id);
        $metodeData = Session::get('metode_pembayaran', ['split' => false, 'metode' => 'Tunai']);

        $metode = $metodeData['split']
            ? 'Split Bill'
            : ($metodeData['metode'] ?? 'Tunai');

        return view('transaksi.struk', compact('transaksi', 'metode'));
    }
}
