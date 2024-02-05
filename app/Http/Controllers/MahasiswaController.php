<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.index');
    }

    public function pengajuanUjian()
    {
        return view('mahasiswa.pengajuan-ujian');
    }

    public function monitoringUjian()
    {
        return view('mahasiswa.monitoring-ujian');
    }

    public function tambahUjian()
    {
        return view('mahasiswa.tambah-ujian');
    }
}
