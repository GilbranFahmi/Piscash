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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kasir_id')->constrained('kasirs')->onDelete('cascade');
            $table->string('kode_qr')->unique();
            $table->decimal('total_harga', 12, 2)->default(0);

        
            $table->decimal('jumlah_bayar', 12, 2)->nullable()->default(0);
            $table->decimal('kembalian', 12, 2)->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
