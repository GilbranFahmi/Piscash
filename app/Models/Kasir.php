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
    ];
    
    public function transaksis() {
        return $this->hasMany(Transaksi::class);
    }

    public function openDrawers() {
        return $this->hasMany(OpenDrawer::class);
    }

    public function closeDrawers() {
        return $this->hasMany(CloseDrawer::class);
    }
}
