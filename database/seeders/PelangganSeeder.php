<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['pelangganID' => '1', 'namaPelanggan' => 'aaa', 'alamat' => 'asasa', 'nomortelp' => 121211],
            ['pelangganID' => '2', 'namaPelanggan' => 'bbb', 'alamat' => 'bbbb', 'nomortelp' => 12121212],
            // tambahkan data lainnya sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel
        DB::table('pelanggans')->insert($data);
    }
}
