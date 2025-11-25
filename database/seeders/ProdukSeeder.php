<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produkData = [
            
            ['kategori_id' => 1, 'nama_produk' => 'Gelang Kayu', 'harga' => 10000, 'stok' => 50],
            ['kategori_id' => 1, 'nama_produk' => 'Gelang Akrilik', 'harga' => 15000, 'stok' => 40],

            
            ['kategori_id' => 2, 'nama_produk' => 'Kalung Perak', 'harga' => 30000, 'stok' => 30],
            ['kategori_id' => 2, 'nama_produk' => 'Kalung Couple', 'harga' => 25000, 'stok' => 50],

            
            ['kategori_id' => 3, 'nama_produk' => 'Case Silikon', 'harga' => 20000, 'stok' => 60],
            ['kategori_id' => 3, 'nama_produk' => 'Case Transparan', 'harga' => 18000, 'stok' => 45],

            
            ['kategori_id' => 4, 'nama_produk' => 'Kacamata Fashion', 'harga' => 27000, 'stok' => 30],
            ['kategori_id' => 4, 'nama_produk' => 'Kacamata Hitam', 'harga' => 35000, 'stok' => 20],

            
            ['kategori_id' => 5, 'nama_produk' => 'Topi Bucket', 'harga' => 30000, 'stok' => 40],
            ['kategori_id' => 5, 'nama_produk' => 'Topi Snapback', 'harga' => 32000, 'stok' => 25],

            
            ['kategori_id' => 6, 'nama_produk' => 'Tas Selempang', 'harga' => 45000, 'stok' => 20],
            ['kategori_id' => 6, 'nama_produk' => 'Tas Mini Korean', 'harga' => 50000, 'stok' => 15],
        ];

        foreach ($produkData as $p) {
            Produk::create([
                'kategori_id' => $p['kategori_id'],
                'nama_produk' => $p['nama_produk'],
                'harga' => $p['harga'],
                'stok' => $p['stok'],
                'gambar' => 'images/produk/dummy.jpg'
            ]);
        }
    }
}
