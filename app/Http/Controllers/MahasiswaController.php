<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.index');
    }

    public function profil()
    {
        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $user = Auth::user();
        return view('mahasiswa.profil',[
            'mahasiswa' => $mahasiswa,
            'user' => $user
        ]);
    }

    public function updateFotoProfil(request $request){
        $user = Auth::user();
        $foto = $user->foto;
        $validatedData = $request->validate([
            'foto' =>'required|file|mimes:jpeg,png,jpg,gif,svg|max:2084',
        ],[
            'foto.required' => 'Foto profil tidak boleh kosong',
            'foto.mimes' => 'Foto profil harus berupa jpeg, png, jpg, gif atau svg',
            'foto.max' => 'Foto profil maksimal 1MB',
        ]);

        if ($request->file('foto')) {
            if($foto != null) {
                Storage::delete($user->foto);
            }
            $foto = $request->file('foto')->store('foto-profil');
        }
 
        $user->update([
            'foto' => $foto
        ]);

        return redirect('mahasiswa/profil')->with('success','Data foto profil berhasil diperbarui');
    }

    public function updateDataProfil(Request $request){
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;

        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim,'.$mahasiswa->id,
            'username' => 'required|unique:users,username,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
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

        return redirect('mahasiswa/profil')->with('success','Data profil berhasil diperbarui');
    }
}
