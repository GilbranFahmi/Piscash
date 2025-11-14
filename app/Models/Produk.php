<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama_produk',
        'harga',
        'kategori_id',
        'stok',
        'gambar',   // ← WAJIB!! kalau ga ada, kolom gambar jadi NULL
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class);
    }
}
