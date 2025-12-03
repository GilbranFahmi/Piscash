<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('transaksis', function (Blueprint $table) {
        if (!Schema::hasColumn('transaksis', 'metode')) {
            $table->string('metode')->default('Tunai')->after('drawer_id');
        }
    });
}

public function down()
{
    Schema::table('transaksis', function (Blueprint $table) {
        if (Schema::hasColumn('transaksis', 'metode')) {
            $table->dropColumn('metode');
        }
    });
}
};
