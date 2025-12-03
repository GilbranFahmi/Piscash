<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $kategori = KategoriProduk::when($search, function ($q) use ($search) {
                $q->where('nama_kategori', 'LIKE', "%$search%");
            })
            ->orderBy('id', 'desc')
            ->get();

        return view('kategori.kategori', compact('kategori', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_produks,nama_kategori'
        ]);

        KategoriProduk::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriProduk::findOrFail($id);

        $request->validate([
            'nama_kategori' => 'required|unique:kategori_produks,nama_kategori,' . $kategori->id
        ]);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect()->back()->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        KategoriProduk::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
