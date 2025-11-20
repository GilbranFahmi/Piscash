<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
     use HasFactory, SoftDeletes;

    protected $table = 'produks';

    protected $fillable = [
        'nama_produk',
        'harga',
        'kategori_id',
        'stok',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class);
    }

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'produk_id');
    }
}
