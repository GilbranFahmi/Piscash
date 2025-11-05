<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // atau nama tabel kamu

    protected $fillable = [
        'nama_produk',
        'harga',
        'kategori_id',
        'stok',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class);
    }
}
