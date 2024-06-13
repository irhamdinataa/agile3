<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PengadaanBarang;

class PengadaanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PengadaanBarang::create([
            'id' =>  \Uuid::generate(4),
            'namabarang' => 'Kertas Roti',
            'jumlah' => 13,
            'penanggung_jawab' => 'Orang 1',
            'status' => '-',
            'created_at' => now()
        ]);
        
        PengadaanBarang::create([
            'id' =>  \Uuid::generate(4),
            'namabarang' => 'Plastik Roti',
            'jumlah' => 23,
            'penanggung_jawab' => 'Orang 2',
            'status' => 'done',
            'created_at' => now()
        ]);

    }
}
