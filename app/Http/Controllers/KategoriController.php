<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = KategoriProduk::all();
        return view('kategori.kategori', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_produks,nama_kategori'
        ], [
            'nama_kategori.required' => 'Nama kategori harus diisi.',
            'nama_kategori.unique' => 'Kategori sudah terdaftar!'
        ]);

        // Simpan ke database
        KategoriProduk::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        KategoriProduk::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
    }
}
