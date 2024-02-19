<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh data seeder
        $data = [
            ['produkID' => '1', 'namaProduk' => 'Produk 1', 'harga' => 100, 'stok' => 2],
            ['produkID' => '2', 'namaProduk' => 'Produk 2', 'harga' => 150, 'stok' => 3],
            // tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel
        DB::table('produks')->insert($data);
    }
}
