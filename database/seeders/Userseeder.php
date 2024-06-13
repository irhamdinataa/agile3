<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' =>  \Uuid::generate(4),
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin1'),
            'role' => 'admin',
        ]);

        User::create([
            'id' =>  \Uuid::generate(4),
            'name' => 'produksi1',
            'email' => 'produksi1@gmail.com',
            'password' => bcrypt('produksi1'),
            'role' => 'produksi',
        ]);

        User::create([
            'id' =>  \Uuid::generate(4),
            'name' => 'pengadaan1',
            'email' => 'pengadaan1@gmail.com',
            'password' => bcrypt('pengadaan1'),
            'role' => 'pengadaan',
        ]);
    }
}
