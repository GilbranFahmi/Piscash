<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    protected $casts = [
        'waktu_tutup' => 'datetime',
        'saldo_awal'  => 'decimal:2',
        'uang_masuk'  => 'decimal:2',
        'uang_keluar' => 'decimal:2',
        'saldo_akhir' => 'decimal:2',
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id');
    }

    /**
     * Helper: tanggal drawer (hari) berdasarkan waktu_tutup.
     * Drawer mengikuti hari, jadi kita pakai date(waktu_tutup).
     */
    public function getTanggalDrawerAttribute(): string
    {
        return $this->waktu_tutup
            ? $this->waktu_tutup->timezone('Asia/Jakarta')->toDateString()
            : Carbon::now('Asia/Jakarta')->toDateString();
    }
}
