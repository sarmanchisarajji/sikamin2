<?php

namespace App\Http\Controllers;

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
        $idUserDosen = Auth::user()->id;

        // Ambil daftar mahasiswa yang dibimbing oleh dosen yang sedang login
        $listBimbingan = Mahasiswa::where('pembimbing_1_id', $idUserDosen)
            ->orWhere('pembimbing_2_id', $idUserDosen)
            ->get();

        return view('dosen.page.mahasiswabimbingan', compact('listBimbingan'));
    }
}
