<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OpenDrawer;
use Carbon\Carbon;

class OpenDrawerSeeder extends Seeder
{
    public function run(): void
    {
        OpenDrawer::create([
            'kasir_id' => 1,
            'saldo_awal' => 0,
            'waktu_buka' => Carbon::now('Asia/Jakarta'),
        ]);
    }
}
