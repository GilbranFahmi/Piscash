<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CloseDrawer extends Model
{
    use HasFactory;

    protected $table = 'close_drawers';

    protected $fillable = [
        'kasir_id',
        'waktu_tutup',
        'saldo_awal',
        'uang_masuk',
        'uang_keluar',
        'saldo_akhir',
    ];

    public $timestamps = true;

    // Relasi: close drawer dimiliki satu kasir
    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id');
    }
}
