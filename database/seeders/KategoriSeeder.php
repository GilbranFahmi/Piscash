<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriProduk;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Gelang',
            'Kalung',
            'Case',
            'Kacamata',
            'Topi',
            'Tas',
        ];

        foreach ($kategori as $k) {
            KategoriProduk::create([
                'nama_kategori' => $k
            ]);
        }
    }
}
