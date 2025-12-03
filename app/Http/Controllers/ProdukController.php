<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    private function generateKodeProduk()
    {
        $lastProduct = Produk::orderBy('id', 'desc')->first();
        $nextNumber = $lastProduct ? ((int) substr($lastProduct->kode_produk, 2)) + 1 : 1;
        return 'PA' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function index()
    {
        $produks = Produk::with('kategori')->get();
        $kategori = KategoriProduk::all();
        return view('produk.produk', compact('produks', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produks,nama_produk',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategori_produks,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kode_produk' => 'nullable|string|unique:produks,kode_produk'
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $namaFile);
            $gambarPath = 'images/produk/' . $namaFile;
        }

        Produk::create([
            'kode_produk' => $request->kode_produk ?: $this->generateKodeProduk(),
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'gambar' => $gambarPath,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produks,nama_produk,' . $produk->id,
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategori_produks,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kode_produk' => 'required|string|unique:produks,kode_produk,' . $produk->id,
        ]);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && File::exists(public_path($produk->gambar))) {
                File::delete(public_path($produk->gambar));
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $namaFile);
            $produk->gambar = 'images/produk/' . $namaFile;
        }

        $produk->update([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori_id' => $request->kategori_id,
            'gambar' => $produk->gambar,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && File::exists(public_path($produk->gambar))) {
            File::delete(public_path($produk->gambar));
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }
}
