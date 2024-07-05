<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class DosenController extends Controller
{
    // public function dashboard()
    // {
    //     $dosenId = Dosen::where('id_user', Auth::user()->id)->value('id');

    //     if (!$dosenId) {
    //         return null;
    //     }

    //     // Dapatkan semua ujian yang memiliki dosen sebagai pembimbing atau pengujinya
    //     $ujians = Ujian::where('id_pembimbing_1', $dosenId)
    //         ->orWhere('id_pembimbing_2', $dosenId)
    //         ->orWhere('id_penguji_1', $dosenId)
    //         ->orWhere('id_penguji_2', $dosenId)
    //         ->orWhere('id_penguji_3', $dosenId)
    //         ->with('mahasiswa') // Eager load relasi dengan mahasiswa
    //         ->get();

    //     // Mengakses relasi ujians pada setiap mahasiswa
    //     foreach ($ujians as $ujian) {
    //         $mahasiswa = $ujian->mahasiswa;
    //         if ($mahasiswa && $mahasiswa->ujians) { // Periksa apakah relasi ujians tidak null
    //             // Dapatkan daftar ujian yang terkait dengan mahasiswa
    //             $ujiansMahasiswa = $mahasiswa->ujians;

    //             // Lakukan operasi yang diinginkan dengan daftar ujian
    //             foreach ($ujiansMahasiswa as $ujianMahasiswa) {
    //                 // Lakukan operasi sesuai kebutuhan
    //             }
    //         }
    //     }
    //     // dd($ujians);
    //     return view('dosen.dashboard', [
    //         'ujian' => $ujians
    //     ]);
    // }
    public function dashboard()
    {
        $dosenId = Dosen::where('id_user', Auth::user()->id)->value('id');

        if (!$dosenId) {
            return null;
        }

        // Dapatkan semua ujian yang memiliki dosen sebagai pembimbing atau pengujinya
        // $currentMonth = Carbon::now()->month;
        // $currentYear = Carbon::now()->year;

        // $ujians = Ujian::where(function ($query) use ($dosenId) {
        //     $query->where('id_pembimbing_1', $dosenId)
        //         ->orWhere('id_pembimbing_2', $dosenId)
        //         ->orWhere('id_penguji_1', $dosenId)
        //         ->orWhere('id_penguji_2', $dosenId)
        //         ->orWhere('id_penguji_3', $dosenId);
        // })
        //     ->whereMonth('tanggal_ujian', $currentMonth)
        //     ->whereYear('tanggal_ujian', $currentYear)
        //     ->with('mahasiswa') // Eager load relasi dengan mahasiswa
        //     ->get();

        $ujians = Ujian::where('id_pembimbing_1', $dosenId)
            ->orWhere('id_pembimbing_2', $dosenId)
            ->orWhere('id_penguji_1', $dosenId)
            ->orWhere('id_penguji_2', $dosenId)
            ->orWhere('id_penguji_3', $dosenId)
            ->with('mahasiswa') // Eager load relasi dengan mahasiswa
            ->get();

        // Inisialisasi variabel untuk menyimpan data
        $mahasiswaBimbingan = [];
        $mahasiswaDiuji = [];
        $totalSelesaiUjian = 0;

        // Mengakses relasi ujians pada setiap mahasiswa
        foreach ($ujians as $ujian) {
            $mahasiswa = $ujian->mahasiswa;

            if ($mahasiswa) {
                // Periksa peran dosen dalam ujian
                if ($ujian->id_pembimbing_1 == $dosenId || $ujian->id_pembimbing_2 == $dosenId) {
                    $mahasiswaBimbingan[$mahasiswa->id] = $mahasiswa;
                } else {
                    $mahasiswaDiuji[$mahasiswa->id] = $mahasiswa;
                }

                // Periksa apakah ujian sudah selesai berdasarkan tgl_ujian
                if (strtotime($ujian->tgl_ujian) < time()) {
                    $totalSelesaiUjian++;
                }
            }
        }

        // Hitung jumlah mahasiswa bimbingan dan diuji
        $jumlahMahasiswaBimbingan = count($mahasiswaBimbingan);
        $jumlahMahasiswaDiuji = count($mahasiswaDiuji);

        return view('dosen.dashboard', [
            'ujian' => $ujians,
            'jumlahMahasiswaBimbingan' => $jumlahMahasiswaBimbingan,
            'jumlahMahasiswaDiuji' => $jumlahMahasiswaDiuji,
            'totalSelesaiUjian' => $totalSelesaiUjian,
        ]);
    }


    public function bimbingan()
    {
        $dosenId = Dosen::where('id_user', Auth::user()->id)->value('id');

        if (!$dosenId) {
            return null; // Jika dosen tidak ditemukan, kembalikan null atau respons yang sesuai
        }

        // Dapatkan semua ujian yang memiliki dosen sebagai pembimbing
        $ujians = Ujian::where('id_pembimbing_1', $dosenId)
            ->orWhere('id_pembimbing_2', $dosenId)
            ->with('mahasiswa') // Eager load relasi dengan mahasiswa
            ->get();

        // // Mengakses relasi ujians pada setiap mahasiswa
        // foreach ($ujians as $ujian) {
        //     $mahasiswa = $ujian->mahasiswa;
        //     if ($mahasiswa) {
        //         // Lakukan operasi yang diinginkan dengan mahasiswa yang dibimbing
        //     }
        // }
        // dd($ujians);

        return view('dosen.bimbingan', [
            'ujian' => $ujians
        ]);
    }

    public function penguji()
    {
        $dosenId = Dosen::where('id_user', Auth::user()->id)->value('id');

        if (!$dosenId) {
            return null; // Jika dosen tidak ditemukan, kembalikan null atau respons yang sesuai
        }

        // Dapatkan semua ujian yang memiliki dosen sebagai penguji
        $ujians = Ujian::where('id_penguji_1', $dosenId)
            ->orWhere('id_penguji_2', $dosenId)
            ->orWhere('id_penguji_3', $dosenId)
            ->with('mahasiswa') // Eager load relasi dengan mahasiswa
            ->get();

        return view('dosen.penguji', [
            'ujian' => $ujians
        ]);
    }

    public function profil()
    {
        $dosen = User::where('id', Auth::user()->id)
            ->with('dosen')
            ->first();

        // dd($dosen);
        $user = Auth::user();
        return view('dosen.profil', [
            'dosen' => $dosen,
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
        return redirect('dosen/profil');
        // return redirect('mahasiswa/profil')->with('success', 'Data foto profil berhasil diperbarui');
    }

    public function updateDataProfil(Request $request)
    {
        $user = Auth::user();
        $dosen = $user->dosen;

        // dd($dosen);

        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'nidn' => 'required|unique:dosens,nidn,' . $dosen->id,
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

        $dosen->update([
            'nama' => $validatedData['nama'],
            'nip' => $validatedData['nip'],
            'nidn' => $validatedData['nidn']
        ]);

        Alert::success('Data profil berhasil diperbarui', session('success'));
        return redirect('dosen/profil');
        // return redirect('mahasiswa/profil')->with('success', 'Data profil berhasil diperbarui');
    }

    public function passwordDosen(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'Kata sandi lama wajib diisi.',
            'new_password.required' => 'Kata sandi baru wajib diisi.',
            'new_password.min' => 'Kata sandi baru minimal terdiri dari 8 karakter.',
            'confirm_new_password.required' => 'Konfirmasi kata sandi baru wajib diisi.',
            'confirm_new_password.same' => 'Konfirmasi kata sandi baru harus sama dengan kata sandi baru.',
        ]);

        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Kata sandi lama salah.'])->withInput();
        }

        $user->password = Hash::make($validatedData['new_password']);
        $user->save();

        Alert::success('Kata sandi berhasil diperbarui', session('success'));
        return redirect()->back();
        // return redirect()->back()->with('success', 'Kata sandi berhasil diperbarui');
    }
}
