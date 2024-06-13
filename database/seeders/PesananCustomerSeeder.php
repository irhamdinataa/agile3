<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PesananCustomer;

class PesananCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PesananCustomer::create([
            'id' =>  \Uuid::generate(4),
            'namabarang' => 'Roti Kering A Butter',
            'kebutuhan' => 53,
            'done' => 20,
            'todo' => 30,
            'created_at' => now()
        ]);
        
        PesananCustomer::create([
            'id' =>  \Uuid::generate(4),
            'namabarang' => 'Roti Kering B Butter',
            'kebutuhan' => 53,
            'done' => 53,
            'todo' => 0,
            'created_at' => now()
        ]);
    }
}
