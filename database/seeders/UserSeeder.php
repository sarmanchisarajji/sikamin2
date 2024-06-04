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

        Mahasiswa::create([
            'nama' => 'Muhamad Amhar Rayadin',
            'nim' => 'E1E120037',
            'tahun_masuk' => '2020',
            'id_user' => 1,
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
            'email' => 'isnawaty@uho.ac.id',
            'password' => Hash::make('isnawaty'),
            'nama_pengguna' => 'Isnawaty, S.Si., M.T.',
            // 'no_hp' => '12345678',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Isnawaty, S.Si., M.T.',
            'nip' => '197611172008122001',
            'nidn' => '0017117606',
            'jabatan_akademik' => 'kajur',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S1 Teknik Informatika',
            'id_user' => 3,
        ]);

        User::create([
            'username' => 'fidakasara',
            'email' => 'fidakasara@gmail.com',
            'password' => Hash::make('fidakasara'),
            'nama_pengguna' => 'LM. Fid Aksara, S.Kom., M.Kom.',
            // 'no_hp' => '12345678',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'LM. Fid Aksara, S.Kom., M.Kom.',
            'nip' => '198407222015041002',
            'nidn' => '0022078406',
            'jabatan_akademik' => 'sekjur',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S1 Teknik Informatika',
            'id_user' => 4,
        ]);

        User::create([
            'username' => 'sutardi',
            'email' => 'sutardi@uho.ac.id',
            'password' => Hash::make('sutardi'),
            'nama_pengguna' => 'Sutardi, S.Kom., M.T.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Sutardi, S.Kom., M.T.',
            'nip' => '197602222010121001',
            'nidn' => '0022027607',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 5,
        ]);

        User::create([
            'username' => 'golokjaya',
            'email' => 'sutardi@uho.ac.id',
            'password' => Hash::make('golokjaya'),
            'nama_pengguna' => 'Prof. Dr. Laode Muhammad Golok Jaya, S.T., M.T.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Prof. Dr. Laode Muhammad Golok Jaya, S.T., M.T.',
            'nip' => '197610202005011002',
            'nidn' => '0020107601',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 6,
        ]);

        User::create([
            'username' => 'mustarum',
            'email' => 'mustarum@uho.ac.id',
            'password' => Hash::make('mustarum'),
            'nama_pengguna' => 'Mustarum Musaruddin, S.T., M.IT., Ph.D.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Mustarum Musaruddin, S.T., M.IT., Ph.D.',
            'nip' => '197301222001121002',
            'nidn' => '0022017304',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 7,
        ]);

        User::create([
            'username' => 'jumadil',
            'email' => 'jumadilnangi@uho.ac.id',
            'password' => Hash::make('jumadil'),
            'nama_pengguna' => 'Jumadil Nangi, S.Kom., M.T.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Jumadil Nangi, S.Kom., M.T.',
            'nip' => '198702062015041003',
            'nidn' => '0906028701',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 8,
        ]);

        User::create([
            'username' => 'statiswaty',
            'email' => 'statiswaty@uho.ac.id',
            'password' => Hash::make('statiswaty'),
            'nama_pengguna' => 'Statiswaty, S.T., MMSI.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Statiswaty, S.T., MMSI.',
            'nip' => '198111072008122003',
            'nidn' => '0007118106',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 9,
        ]);

        User::create([
            'username' => 'hasminatari',
            'email' => 'hasminatarimokui@uho.ac.id',
            'password' => Hash::make('hasminatari'),
            'nama_pengguna' => 'Hasmina Tari Mokui, S.ST., M.E., Ph.D.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Hasmina Tari Mokui, S.ST., M.E., Ph.D.',
            'nip' => '197812172005012002',
            'nidn' => '0017127802',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 10,
        ]);

        User::create([
            'username' => 'ihsansarita',
            'email' => 'ihsan.sarita@uho.ac.id',
            'password' => Hash::make('ihsansarita'),
            'nama_pengguna' => 'Dr. Muh. Ihsan Sarita, M.Kom.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Dr. Muh. Ihsan Sarita, M.Kom.',
            'nip' => '196502091989021001',
            'nidn' => '0009096503',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 11,
        ]);

        User::create([
            'username' => 'ikapurwanti',
            'email' => 'ika.purwanti@uho.ac.id',
            'password' => Hash::make('ikapurwanti'),
            'nama_pengguna' => 'Ika Purwanti Ningrum, S.Kom., M.Cs.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Ika Purwanti Ningrum, S.Kom., M.Cs.',
            'nip' => '196502091989021001',
            'nidn' => '0016018306',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 12,
        ]);

        User::create([
            'username' => 'rizaladisaputra',
            'email' => 'rizaladisaputra@uho.ac.id',
            'password' => Hash::make('rizaladisaputra'),
            'nama_pengguna' => 'Rizal Adi Saputra, S.T., M.Kom.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Rizal Adi Saputra, S.T., M.Kom.',
            'nip' => '199104062019031021',
            'nidn' => '0006049104',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 13,
        ]);

        User::create([
            'username' => 'natalisransi',
            'email' => 'natalis.ransi@uho.ac.id',
            'password' => Hash::make('natalisransi'),
            'nama_pengguna' => 'Natalis Ransi, S.Si., M.Cs.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Natalis Ransi, S.Si., M.Cs.',
            'nip' => '198412252015041002',
            'nidn' => '0025128402',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 14,
        ]);

        User::create([
            'username' => 'bahtiaraksara',
            'email' => 'bahtiar.aksara@uho.ac.id',
            'password' => Hash::make('bahtiaraksara'),
            'nama_pengguna' => 'LM. Bahtiar Aksara, S.T., M.T.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'LM. Bahtiar Aksara, S.T., M.T.',
            'nip' => '198609292019031011',
            'nidn' => '0929098602',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 15,
        ]);

        User::create([
            'username' => 'muhyamin',
            'email' => 'muh_yamin@uho.ac.id',
            'password' => Hash::make('muhyamin'),
            'nama_pengguna' => 'Muhammad Yamin, S.T., M.Eng.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Muhammad Yamin, S.T., M.Eng.',
            'nip' => '198306142010011017',
            'nidn' => '0014068304',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 16,
        ]);

        User::create([
            'username' => 'lasurimi',
            'email' => 'lasurimi@uho.ac.id',
            'password' => Hash::make('lasurimi'),
            'nama_pengguna' => 'La Surimi, S.Si., M.Cs.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'La Surimi, S.Si., M.Cs.',
            'nip' => '198306142010011017',
            'nidn' => '0005078610',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 17,
        ]);

        User::create([
            'username' => 'tajidun',
            'email' => 'tajidun@uho.ac.id',
            'password' => Hash::make('tajidun'),
            'nama_pengguna' => 'Laode Muhammad Tajidun, S.T., M.T.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Laode Muhammad Tajidun, S.T., M.T.',
            // 'nip' => 198306142010011017,
            'nidn' => '0030048107',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 18,
        ]);

        User::create([
            'username' => 'bambangpramono',
            'email' => 'bambang.pramono@uho.ac.id',
            'password' => Hash::make('bambangpramono'),
            'nama_pengguna' => 'Bambang Pramono, S.Si., M.T.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Bambang Pramono, S.Si., M.T.',
            'nip' => '197104252008011010',
            'nidn' => '0025047107',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 19,
        ]);

        User::create([
            'username' => 'adhasajiah',
            'email' => 'adha.m.sajiah@uho.ac.id',
            'password' => Hash::make('adhasajiah'),
            'nama_pengguna' => 'Adha Mashur Sajiah, S.T., M.Eng.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Adha Mashur Sajiah, S.T., M.Eng.',
            'nip' => '1991062320180310001',
            'nidn' => '0023069101',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 20,
        ]);

        User::create([
            'username' => 'asahari',
            'email' => 'asa.hari@uho.ac.id',
            'password' => Hash::make('asahari'),
            'nama_pengguna' => 'Asa Hari Wibowo, S.T., M.Eng.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Asa Hari Wibowo, S.T., M.Eng.',
            'nip' => '199408172022031014',
            'nidn' => '0017089402',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 21,
        ]);

        User::create([
            'username' => 'subardin',
            'email' => 'subardin@uho.ac.id',
            'password' => Hash::make('subardin'),
            'nama_pengguna' => 'Subardin, S.T., M.T.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Subardin, S.T., M.T.',
            // 'nip' => 199408172022031014,
            'nidn' => '0920057902',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 22,
        ]);

        User::create([
            'username' => 'ilhamjulianefendi',
            'email' => 'ilham.julian.efendi@uho.ac.id',
            'password' => Hash::make('ilhamjulianefendi'),
            'nama_pengguna' => 'Ilham Julian Efendi, S.T., M.T.',
            'user_type' => 'dosen',
            'is_aktif' => 'y',
        ]);

        Dosen::create([
            'nama_dosen' => 'Ilham Julian Efendi, S.T., M.T.',
            // 'nip' => 199408172022031014,
            'nidn' => '0011078904',
            'jabatan_akademik' => 'dosen',
            // 'tmt_akademik' => '2020-08-14',
            'status' => 'aktif',
            // 'pangkat' => 'Pembina, IV/A',
            // 'tmt_pangkat' => '2020-08-14',
            // 'pendidikan_terakhir' => 'S2 Teknik Informatika',
            'id_user' => 23,
        ]);
    }
}
