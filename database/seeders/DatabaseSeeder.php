<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Prodis;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id' => \Uuid::generate(4),
            'name' => 'Test User',
            'email' => 'usertest@gmail.com',
            'password' => bcrypt('usertest'),
            'role' => 'admin',
        ]);

    }
}
