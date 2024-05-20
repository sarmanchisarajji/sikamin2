<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
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
            'nama_pengguna' => 'Muhamad Amhar Rayadin',
            'no_hp' => '12345678',
            'user_type' => 'mahasiswa',
            'is_aktif' => 'y',
        ]);

        User::create([
            'username' => 'staff12345',
            'email' => 'afdahlul@gmail.com',
            'password' => Hash::make('staff12345'),
            'nama_pengguna' => 'Afdhalul Rahmat',
            'no_hp' => '12345678',
            'user_type' => 'staff',
            'is_aktif' => 'y',
        ]);

        User::create([
            'username' => 'isnawaty',
            'email' => 'isnawaty@gmail.com',
            'password' => Hash::make('isnawaty'),
            'nama_pengguna' => 'Isnawaty',
            'no_hp' => '12345678',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        User::create([
            'username' => 'fidakasara',
            'email' => 'fidakasara@gmail.com',
            'password' => Hash::make('fidakasara'),
            'nama_pengguna' => 'LM Fid Aksara',
            'no_hp' => '12345678',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Mahasiswa::create([
            'nama' => 'Muhamad Amhar Rayadin',
            'nim' => 'E1E120037',
            'tahun_masuk' => '2020',
            'id_user' => 1,
        ]);

        Dosen::create([
            'nama_dosen' => 'Isnawaty',
            'nip' => 12344,
            'nidn' => 12332323,
            'jabatan_akademik' => 'dosen',
            'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            'pangkat' => 'Pembina, IV/A',
            'tmt_pangkat' => '2020-08-14',
            'pendidikan_terakhir' => 'S1 Teknik Informatika',
            'id_user' => 3,
        ]);

        Dosen::create([
            'nama_dosen' => 'LM Fid Aksara',
            'nip' => 12345,
            'nidn' => 123323233,
            'jabatan_akademik' => 'dosen',
            'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            'pangkat' => 'Pembina, IV/A',
            'tmt_pangkat' => '2020-08-14',
            'pendidikan_terakhir' => 'S1 Teknik Informatika',
            'id_user' => 4,
        ]);
    }
}
