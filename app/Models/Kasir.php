<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'username',
        'password',
        'drawer_id',
    ];
    
    public function transaksis() {
        return $this->hasMany(Transaksi::class);
    }

    public function drawer()
{
    return $this->belongsTo(OpenDrawer::class, 'drawer_id');
}


    public function closeDrawers() {
        return $this->hasMany(CloseDrawer::class);
    }
}
