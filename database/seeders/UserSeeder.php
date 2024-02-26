<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Admin', 
                'email' => 'admin@admin.com', 
                'password' => '123', 
                'role' => 'admin',
            ],
            [
                'name' => 'Petugas', 
                'email' => 'petugas@petugas.com', 
                'password' => '123', 
                'role' => 'petugas',
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
