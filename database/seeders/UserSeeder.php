<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'E1E120037',
            'email' => 'amhar@gmail.com',
            'password' => Hash::make('E1E120037'),
            'nama_pengguna' => 'Amhar Ray',
            'no_hp' => '12345678',
            'user_type' => 'mahasiswa',
            'is_aktif' => 'y',
        ]);

        User::create([
            'username' => 'E1E120024',
            'email' => 'afdahlul@gmail.com',
            'password' => Hash::make('E1E120024'),
            'nama_pengguna' => 'Afdhalul Rahmat',
            'no_hp' => '12345678',
            'user_type' => 'staff',
            'is_aktif' => 'y',
        ]);

        User::create([
            'username' => 'E1E120001',
            'email' => 'cia@gmail.com',
            'password' => Hash::make('E1E120001'),
            'nama_pengguna' => 'Nurfauziah Makmur',
            'no_hp' => '12345678',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);
    }
}
