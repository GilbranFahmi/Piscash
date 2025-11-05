<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProduk extends Model
{
    protected $fillable = ['nama_kategori','id_kategori'];

    public function produks() {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}
