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
        Schema::create('produks', function (Blueprint $table) {
            $table->bigInteger('produkID')->primary();
            $table->string('namaProduk');
            $table->integer('harga');
            $table->integer('stok');
            $table->timestamps();
            //$table->primary('produkID'); // Pastikan ini sesuai dengan tipe data yang diacu

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
