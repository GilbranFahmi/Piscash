<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OpenDrawer extends Model
{
    protected $fillable = ['kasir_id', 'waktu_buka', 'saldo_awal'];

    public function kasir() {
        return $this->belongsTo(Kasir::class);
    }
}
