<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Filebukti;
use App\Models\Mahasiswa;
use App\Models\Ujian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function mahasiswa_store(Request $req)
    {
        $validatedData = $req->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'tahun_masuk' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'status' => 'required',
        ]);

        DB::transaction(function () use ($validatedData) {
            $user = User::create([
                'username' => $validatedData['username'],
                'password' => bcrypt($validatedData['password']),
                'nama_pengguna' => $validatedData['nama'],
                'email' => '',
                'no_hp' => '',
                'user_type' => 'mahasiswa',
                'is_aktif' => $validatedData['status'] === 'aktif' ? 'y' : 'n',
            ]);

            $mahasiswa = Mahasiswa::create([
                'nama' => $validatedData['nama'],
                'nim' => $validatedData['nim'],
                'tahun_masuk' => $validatedData['tahun_masuk'],
                'id_user' => $user->id,
            ]);
        });

        toast('Berhasil Menambahkan Mahasiswa Baru', 'success');
        return redirect()->route('s-mahasiswa-index');
    }

    public function mahasiswa_edit($id)
    {
        $mahasiswa = Mahasiswa::where('id_user', $id)->with('user')->first();
        return view('staff.mahasiswa_create', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function mahasiswa_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'nama' => 'required',
            'nim' => 'required',
            'tahun_masuk' => 'required',
            'username' => 'required',
            'password' => 'nullable|min:6',
            'status' => 'required',
        ]);

        DB::transaction(function () use ($validatedData, $id) {
            $user = User::findOrFail($id);
            $mahasiswa = Mahasiswa::where('id_user', $id)->firstOrFail();

            $mahasiswa->update([
                'nama' => $validatedData['nama'],
                'nim' => $validatedData['nim'],
                'tahun_masuk' => $validatedData['tahun_masuk'],
            ]);

            $user->update([
                'username' => $validatedData['username'],
                'nama_pengguna' => $validatedData['nama'],
                'user_type' => 'mahasiswa',
                'is_aktif' => $validatedData['status'] === 'aktif' ? 'y' : 'n',
                'password' => !empty($validatedData['password']) ? Hash::make($validatedData['password']) : $user->password,
            ]);
        });

        toast('Berhasil Mengubah Data Mahasiswa', 'success');

        return redirect()->route('s-mahasiswa-index');
    }
    public function mahasiswa_delete($id)
    {
        $user = User::findOrFail($id);
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->get();

        foreach ($mahasiswa as $mhs) {
            $ujians = Ujian::where('id_mahasiswa', $mhs->id)->with('filebukti')->get();
            foreach ($ujians as $ujian) {
                foreach ($ujian->filebukti as $fileBukti) {
                    $path = $fileBukti->file;
                    if (Storage::exists($path)) {
                        Storage::delete($path);
                    }
                }
            }
        }
        $user->delete();

        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('s-mahasiswa-index');
    }

    public function dosen_index()
    {
        $dosen = Dosen::with('user')->get();
        return view('staff.dosen', [
            'dosen' => $dosen,
        ]);
    }

    public function dosen_create()
    {
        return view('staff.dosen_create');
    }

    public function dosen_store(Request $req)
    {
        $validatedData = $req->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosens',
            'nidn' => 'required|unique:dosens',
            'jabatan' => 'required',
            'tmt_akademik' => 'required',
            'pangkat' => 'required',
            'tmt_pangkat' => 'required',
            'pendidikan_terakhir' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'status' => 'required'
        ]);

        DB::transaction(function () use ($validatedData) {
            $user = User::create([
                'username' => $validatedData['username'],
                'password' => bcrypt($validatedData['password']),
                'nama_pengguna' => $validatedData['nama'],
                'email' => '',
                'no_hp' => '',
                'user_type' => 'dosen',
                'is_aktif' => $validatedData['status'] === 'aktif' ? 'y' : 'n',
            ]);

            $dosen = Dosen::create([
                'nama_dosen' => $validatedData['nama'],
                'nip' => $validatedData['nip'],
                'nidn' => $validatedData['nidn'],
                'jabatan_akademik' => $validatedData['jabatan'],
                'tmt_akademik' => $validatedData['tmt_akademik'],
                'status' => $validatedData['status'],
                'pangkat' => $validatedData['pangkat'],
                'tmt_pangkat' => $validatedData['tmt_pangkat'],
                'pendidikan_terakhir' => $validatedData['pendidikan_terakhir'],
                'id_user' => $user->id
            ]);
        });

        return redirect()->route('s-dosen-index')->with('success', 'Berhasil Menambahkan Data Dosen');
    }

    public function dosen_edit($id)
    {
        $dosen = Dosen::where('id_user', $id)->with('user')->first();
        return view('staff.dosen_create', [
            'dosen' => $dosen
        ]);
    }

    public function dosen_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nidn' => 'required',
            'jabatan' => 'required',
            'tmt_akademik' => 'required',
            'pangkat' => 'required',
            'tmt_pangkat' => 'required',
            'pendidikan_terakhir' => 'required',
            'username' => 'required',
            'status' => 'required'
        ]);

        DB::transaction(function () use ($validatedData, $id) {
            $user = User::findOrFail($id);
            $dosen = Dosen::where('id_user', $id)->firstOrFail();

            $dosen->update([
                'nama_dosen' => $validatedData['nama'],
                'nip' => $validatedData['nip'],
                'nidn' => $validatedData['nidn'],
                'jabatan_akademik' => $validatedData['jabatan'],
                'tmt_akademik' => $validatedData['tmt_akademik'],
                'status' => $validatedData['status'],
                'pangkat' => $validatedData['pangkat'],
                'tmt_pangkat' => $validatedData['tmt_pangkat'],
                'pendidikan_terakhir' => $validatedData['pendidikan_terakhir'],
            ]);

            $user->update([
                'username' => $validatedData['username'],
                'nama_pengguna' => $validatedData['nama'],
                'user_type' => 'mahasiswa',
                'is_aktif' => $validatedData['status'] === 'aktif' ? 'y' : 'n',
                'password' => !empty($validatedData['password']) ? Hash::make($validatedData['password']) : $user->password,
            ]);
        });

        toast('Berhasil Mengubah Data Dosen', 'success');

        return redirect()->route('s-dosen-index');
    }

    public function dosen_delete($id)
    {
        $dosen = User::findOrFail($id);
        $dosen->delete();

        toast('Data Berhasil Dihapus', 'success');
        return redirect()->route('s-dosen-index');
    }

    public function monitoring_dosen()
    {
        $dosen = Dosen::all();

        return view('staff.m_dosen', [

            'dosen' => $dosen
        ]);
    }

    public function monitoring_proposal()
    {
        $proposal = Ujian::where('jenis_ujian', 'proposal')->with('mahasiswa')->get();
        return view('staff.m_proposal', [
            'proposal' => $proposal
        ]);
    }

    public function monitoring_hasil()
    {
        $proposal = Ujian::where('jenis_ujian', 'hasil')->with('mahasiswa')->get();
        return view('staff.m_hasil', [
            'proposal' => $proposal
        ]);
    }

    public function verifikasi_ujian()
    {
        $proposal = Ujian::where('jenis_ujian', 'proposal')->with('mahasiswa')->get();
        return view('staff.v_ujian', [
            'proposal' => $proposal
        ]);
    }

    public function bukti_dukung($id)
    {
        $file = Filebukti::where('id_ujian', $id)->get();
        $mahasiswa = Ujian::where('id', $id)->get();
        // dd($mahasiswa);
        return view('staff.bukti_dukung', [
            'file' => $file,
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function update_status_ujian(Request $req, $id)
    {
        $ujian = Ujian::findOrFail($id);
        $ujian->update([
            'status' => $req->status
        ]);
        return redirect(route('s-v_proposal-index'));
    }
}
