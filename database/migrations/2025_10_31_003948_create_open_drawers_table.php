<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenDrawersTable extends Migration
{
    public function up()
    {
        Schema::create('open_drawers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kasir_id');
            $table->date('tanggal');
            $table->time('waktu_buka');
            $table->integer('saldo_awal')->default(0);
            $table->string('status')->default('Aktif'); // Aktif / Ditutup
            $table->timestamps();

            $table->foreign('kasir_id')->references('id')->on('kasirs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('open_drawers');
    }
}
