<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('close_drawers', function (Blueprint $table) {
            // Total penjualan (total_harga semua transaksi di drawer hari itu)
            $table->decimal('uang_masuk', 12, 2)
                  ->default(0)
                  ->after('saldo_awal');

            // Uang yang diambil dari drawer saat penutupan (optional)
            $table->decimal('uang_keluar', 12, 2)
                  ->default(0)
                  ->after('uang_masuk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('close_drawers', function (Blueprint $table) {
            $table->dropColumn(['uang_masuk', 'uang_keluar']);
        });
    }
};
