<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualanID' => '1', 'tglPenjualan' => '2024-02-24', 'totalHarga' => 100, 'pelangganID' => 1],
            ['penjualanID' => '2', 'tglPenjualan' => '2024-02-24', 'totalHarga' => 200, 'pelangganID' => 2],
            // tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel
        DB::table('penjualans')->insert($data);
    }
}
