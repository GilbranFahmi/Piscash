<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CloseDrawer extends Model
{
    protected $fillable = ['kasir_id', 'waktu_tutup', 'saldo_akhir'];

    public function kasir() {
        return $this->belongsTo(Kasir::class);
    }
}
