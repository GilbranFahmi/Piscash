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
        $nextNumber = $lastProduct
            ? ((int) substr($lastProduct->kode_produk, 2)) + 1
            : 1;

        return 'PA' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $produks = Produk::with('kategori')
            ->when($search, function ($q) use ($search) {
                $q->where(function ($q) use ($search) {
                    $q->where('kode_produk', 'LIKE', "%{$search}%")
                      ->orWhere('nama_produk', 'LIKE', "%{$search}%");
                });
            })
            ->orderBy('id', 'desc')
            ->get();

        $kategori = KategoriProduk::all();

        return view('produk.produk', compact('produks', 'kategori', 'search'));
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

        $data = $request->only(['nama_produk', 'harga', 'stok', 'kategori_id']);
        $data['kode_produk'] = $request->kode_produk ?: $this->generateKodeProduk();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $fileName);
            $data['gambar'] = 'images/produk/' . $fileName;
        }

        Produk::create($data);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produks,nama_produk,' . $id,
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'kategori_id' => 'required|exists:kategori_produks,id',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kode_produk' => 'required|string|unique:produks,kode_produk,' . $id
        ]);

        $updateData = $request->only(['nama_produk', 'harga', 'stok', 'kategori_id', 'kode_produk']);
        $updateData['gambar'] = $produk->gambar;

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && File::exists(public_path($produk->gambar))) {
                File::delete(public_path($produk->gambar));
            }

            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/produk'), $fileName);
            $updateData['gambar'] = 'images/produk/' . $fileName;
        }

        $produk->update($updateData);

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
