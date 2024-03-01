<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function dashboard(){
        return view('dosen.index');
    }
    public function mahasiswaBimbinganList()
    {
        $idUser = Auth::user()->id;

        // Cari ID dosen yang terkait dengan user yang sedang login
        $dosen = Dosen::where('id_user', $idUser)->first();
    
        if ($dosen) {
            // Ambil daftar mahasiswa yang dibimbing oleh dosen yang sedang login
            $listBimbingan = Mahasiswa::where('pembimbing_1_id', $dosen->id)
                            ->orWhere('pembimbing_2_id', $dosen->id)
                            ->get();
        } else {
            // Jika tidak ada dosen yang terkait dengan user yang sedang login
            $listBimbingan = collect(); // Membuat koleksi kosong
        }
        return view('dosen.page.mahasiswabimbingan', compact('listBimbingan'));
    }
}
