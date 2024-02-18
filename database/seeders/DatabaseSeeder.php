<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin',
            'jenis_kelamin' => 'Laki-laki',
            'telp' => '08123432474',
            'alamat' => 'Padang',
            'tempat_lhr' => 'Padang',
            'tanggal_lhr' => date('Y-m-d'),
            'no_kartu' => null,
            'role' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
