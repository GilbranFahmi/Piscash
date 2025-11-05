<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['kasir_id', 'kode_qr', 'total_harga'];

    public function kasir() {
        return $this->belongsTo(Kasir::class);
    }

    public function detailTransaksis() {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function riwayat() {
        return $this->hasOne(RiwayatTransaksi::class);
    }
}
