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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->bigInteger('penjualanID')->primary();
            $table->date('tglPenjualan')->default(now());
            $table->integer('totalHarga');
            $table->bigInteger('pelangganID');
            $table->timestamps();

            $table->foreign('pelangganID')->references('pelangganID')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
