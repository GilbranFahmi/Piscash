<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kasir;
use Illuminate\Support\Facades\Hash;

class KasirSeeder extends Seeder
{
    public function run(): void
    {
        Kasir::create([
            'nama' => 'root',
            'username' => 'root',
            'password' => Hash::make('root123'),
        ]);
    }
}
