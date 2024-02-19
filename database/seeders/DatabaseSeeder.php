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
        
        // User::create([
        //     'name' => 'Admin',
        //     'jenis_kelamin' => 'Laki-laki',
        //     'telp' => '08123432474',
        //     'alamat' => 'Padang',
        //     'tempat_lhr' => 'Padang',
        //     'tanggal_lhr' => date('Y-m-d'),
        //     'no_kartu' => null,
        //     'role' => 'Admin',
        //     'username' => 'admin',
        //     'password' => Hash::make('admin123'),
        // ]);
        User::create([
            'name' => 'test',
            'jenis_kelamin' => 'Laki-laki',
            'telp' => '08123432474',
            'alamat' => 'Padang',
            'tempat_lhr' => 'Padang',
            'tanggal_lhr' => date('Y-m-d'),
            'no_kartu' => '1234',
            'role' => 'Admin',
            'username' => 'test',
            'password' => Hash::make('test123'),
        ]);
    }
}
