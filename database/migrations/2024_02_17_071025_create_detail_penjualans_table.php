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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->bigIncrements('detailID');
            $table->bigInteger('penjualanID'); // Gunakan unsigned
            $table->bigInteger('produkID'); // Gunakan unsigned
            $table->integer('jumlahProduk');
            $table->integer('subTotal');
            $table->timestamps();

           $table->foreign('penjualanID')->references('penjualanID')->on('penjualans');
           $table->foreign('produkID')->references('produkID')->on('produk2s');
           

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
