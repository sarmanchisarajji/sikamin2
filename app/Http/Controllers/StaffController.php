<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('staff.dashboard');
    }

    public function mahasiswa_index()
    {
        $mahasiswa = Mahasiswa::with('user')->get();
        return view('staff.mahasiswa', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function mahasiswa_create()
    {
        return view('staff.mahasiswa_create');
    }

    public function mahasiswa_store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'tahun_masuk' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'status' => 'required',
        ]);

        // try {
            DB::transaction(function () use ($validatedData) {
                // Langkah 1: Tambahkan User
                $user = User::create([
                    'username' => $validatedData['username'],
                    'password' => bcrypt($validatedData['password']),
                    'nama_pengguna' => '',
                    'email' => '',
                    'no_hp' => '',
                    'user_type' => 'mahasiswa',
                    'is_aktif' => $validatedData['status'] === 'aktif' ? 'y' : 'n',
                ]);

                // Langkah 2: Tambahkan Mahasiswa dengan ID User yang baru dibuat
                $mahasiswa = Mahasiswa::create([
                    'nama' => $validatedData['nama'],
                    'nim' => $validatedData['nim'],
                    'tahun_masuk' => $validatedData['tahun_masuk'],
                    'id_user' => $user->id,
                ]);
            });

            return redirect()->route('s-mahasiswa-index')->with('success', 'Berhasil Menambahkan Data Mahasiswa');
        } 
        // catch (\Exception $e) {
        //     // Handle exception jika terjadi
        //     dd($e);
        //     return redirect()->route('staff/mahasiswa')->with('error', 'Gagal Menambahkan Data Mahasiswa');
        // }
    // }

    public function dosen_index(){
        $dosen = Dosen::with('user')->get();
        return view('staff.dosen', [
            'dosen' => $dosen
        ]);
    }

    public function dosen_create(){
        return view('staff.dosen_create');
    }

    public function monitoring_dosen(){
        return view('staff.m_dosen');
    }

    public function monitoring_proposal(){
        return view('staff.m_proposal');
    }

}
