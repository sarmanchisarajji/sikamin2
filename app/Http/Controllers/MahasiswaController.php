<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Ujian;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mhs_id = Auth::user()->id;
        $ujian = Ujian::where('id_mahasiswa', $mhs_id)
            ->latest('created_at')
            ->first();
        return view('mahasiswa.index', [
            'ujian' => $ujian
        ]);
    }

    public function profil()
    {
        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $user = Auth::user();
        return view('mahasiswa.profil', [
            'mahasiswa' => $mahasiswa,
            'user' => $user
        ]);
    }

    public function updateFotoProfil(request $request)
    {
        $user = Auth::user();
        $foto = $user->foto;
        $validatedData = $request->validate([
            'foto' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2084',
        ], [
            'foto.required' => 'Foto profil tidak boleh kosong',
            'foto.mimes' => 'Foto profil harus berupa jpeg, png, jpg, gif atau svg',
            'foto.max' => 'Foto profil maksimal 1MB',
        ]);

        if ($request->file('foto')) {
            if ($foto != null) {
                Storage::delete($user->foto);
            }
            $foto = $request->file('foto')->store('foto-profil');
        }

        $user->update([
            'foto' => $foto
        ]);

        Alert::success('Data foto profil berhasil diperbarui', session('success'));
        return redirect('mahasiswa/profil');
        // return redirect('mahasiswa/profil')->with('success', 'Data foto profil berhasil diperbarui');
    }

    public function updateDataProfil(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required',
        ]);

        $user->update([
            'username' => $validatedData['username'],
            'nama_pengguna' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'no_hp' => $validatedData['no_hp']
        ]);

        $mahasiswa->update([
            'nama' => $validatedData['nama'],
            'nim' => $validatedData['nim']
        ]);

        Alert::success('Data profil berhasil diperbarui', session('success'));
        return redirect('mahasiswa/profil');
        // return redirect('mahasiswa/profil')->with('success', 'Data profil berhasil diperbarui');
    }
}
