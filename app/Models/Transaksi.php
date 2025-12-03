<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'kasir_id',
        'drawer_id',
        'kode_qr',
        'total_harga',
        'jumlah_bayar',
        'kembalian',
        'metode',          // penting untuk rekap metode pembayaran
    ];

    protected $casts = [
        'total_harga'  => 'decimal:2',
        'jumlah_bayar' => 'decimal:2',
        'kembalian'    => 'decimal:2',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'kasir_id');
    }

    public function drawer()
    {
        return $this->belongsTo(OpenDrawer::class, 'drawer_id');
    }

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id');
    }
}
