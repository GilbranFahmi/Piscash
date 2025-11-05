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
        Schema::create('close_drawers', function (Blueprint $table) {
    $table->id();
    $table->foreignId('kasir_id')->constrained('kasirs')->onDelete('cascade');
    $table->timestamp('waktu_tutup');
    $table->decimal('saldo_akhir', 12, 2);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('close_drawers');
    }
};
