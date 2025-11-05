<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    protected $fillable = ['transaksi_id', 'waktu_transaksi', 'status'];

    public function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }
}
