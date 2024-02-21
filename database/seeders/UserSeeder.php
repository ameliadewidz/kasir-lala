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
                'name' => 'Admin Lala',
                'email' => 'lala1@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('123'),
            ],
            // [
            //     'name' => 'Amel',
            //     'email' => 'amel@gmail.com',
            //     'role' => 'admin',
            //     'password' => bcrypt('amel123'),
            // ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
