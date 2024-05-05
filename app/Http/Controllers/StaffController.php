<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Filebukti;
use App\Models\Mahasiswa;
use App\Models\Ujian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    public function profil()
    {
        $user = auth()->user();
        return view('staff.profil', [
            'user' => $user
        ]);
    }

    public function dashboard()
    {
        $mahasiswa = Mahasiswa::with('ujian')->get();
        $dosen = Dosen::get()->count();
        $proposal = Ujian::where('jenis_ujian', 'proposal')->get()->count();
        $hasil = Ujian::where('jenis_ujian', 'hasil')->get()->count();
        $skripsi = Ujian::where('jenis_ujian', 'skripsi')->get()->count();

        
        return view('staff.dashboard', [
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'proposal' => $proposal,
            'hasil' => $hasil,
            'skripsi' => $skripsi  
        ]);
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
        $dosens = Dosen::with('user')
        ->select(
            'dosens.*',
            DB::raw('(SELECT COUNT(DISTINCT CASE 
                WHEN uj1.id_pembimbing_1 = dosens.id THEN uj1.id_mahasiswa 
                WHEN uj1.id_pembimbing_2 = dosens.id THEN uj1.id_mahasiswa 
            END) 
            FROM ujians uj1 
            WHERE uj1.id_pembimbing_1 = dosens.id OR uj1.id_pembimbing_2 = dosens.id) as total_bimbingan'),
            DB::raw('(SELECT COUNT(DISTINCT uj2.id_mahasiswa) 
                FROM ujians uj2 
                WHERE uj2.id_penguji_1 = dosens.id OR uj2.id_penguji_2 = dosens.id OR uj2.id_penguji_3 = dosens.id) as total_pengujian')
        )
            ->get();

        foreach ($dosens as $dosen) {
            $mahasiswasBimbingan = [];
            $mahasiswasPenguji = [];

            $ujiansBimbingan = Ujian::where('id_pembimbing_1', $dosen->id)
                ->orWhere('id_pembimbing_2', $dosen->id)
                ->with('mahasiswa') // Eager load data mahasiswa
                ->get();

            $ujiansPenguji = Ujian::where('id_penguji_1', $dosen->id)
                ->orWhere('id_penguji_2', $dosen->id)
                ->orWhere('id_penguji_3', $dosen->id)
                ->with('mahasiswa') // Eager load data mahasiswa
                ->get();

            foreach ($ujiansBimbingan as $ujian) {
                $mahasiswa = $ujian->mahasiswa; // Ambil objek mahasiswa
                $judul = $ujian->judul; // Ambil judul ujian
                $mahasiswasBimbingan[$mahasiswa->id] = [
                    'nama' => $mahasiswa->nama,
                    'judul' => $judul,
                ]; // Simpan objek mahasiswa dan judul ujian
            }

            foreach ($ujiansPenguji as $ujian) {
                $mahasiswa = $ujian->mahasiswa; // Ambil objek mahasiswa
                $judul = $ujian->judul; // Ambil judul ujian
                $mahasiswasPenguji[$mahasiswa->id] = [
                    'nama' => $mahasiswa->nama,
                    'judul' => $judul,
                ]; // Simpan objek mahasiswa dan judul ujian
            }

            // Ubah array asosiatif menjadi array biasa
            $dosen->mahasiswasBimbingan = array_values($mahasiswasBimbingan);
            $dosen->mahasiswasPenguji = array_values($mahasiswasPenguji);
        }

        return view('staff.m_dosen', [
            'dosens' => $dosens,
        ]);
    }



    public function monitoring_ujian()
    {
        $ujian = Ujian::with('mahasiswa')->get();
        return view('staff.m_ujian', [
            'ujian' => $ujian
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

    public function monitoring_skripsi()
    {
        $skripsi = Ujian::where('jenis_ujian', 'skripsi')->with('mahasiswa')->get();
        return view('staff.m_skripsi', [
            'skripsi' => $skripsi
        ]);
    }

    public function verifikasi_proposal()
    {
        $proposal = Ujian::where('jenis_ujian', 'proposal')->with('mahasiswa')->get();
        return view('staff.v_proposal', [
            'proposal' => $proposal
        ]);
    }

    public function verifikasi_hasil()
    {
        $hasil = Ujian::where('jenis_ujian', 'hasil')->with('mahasiswa')->get();
        return view('staff.v_hasil', [
            'hasil' => $hasil
        ]);
    }

    public function verifikasi_skripsi()
    {
        $skripsi = Ujian::where('jenis_ujian', 'skripsi')->with('mahasiswa')->get();
        return view('staff.v_skripsi', [
            'skripsi' => $skripsi
        ]);
    }

    public function verifikasi_ujian_form($id)
    {
        $dosen = Dosen::all();
        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        return view('staff.v_ujian_update', [
            'dosen' => $dosen,
            'ujian' => $ujian
        ]);
    }

    public function verifikasi_ujian_update(Request $req, $id)
    {
        $ujian = Ujian::where('id', $id)->firstOrFail();
        $ujian->update([
            'status' => 'disetujui',
            'id_penguji_1' =>  $req->id_penguji_1,
            'id_penguji_2' => $req->id_penguji_2,
            'id_penguji_3' => $req->id_penguji_3,
            'tanggal_ujian' => $req->tanggal_ujian,
            'jam_ujian' => $req->jam_ujian,
            'tempat_ujian' => $req->tempat_ujian,
            'ipk_sementara' => $req->ipk_sementara,
            'id_pembimbing_1' => $req->id_pembimbing_1,
            'id_pembimbing_2' => $req->id_pembimbing_2,
        ]);

        toast('Berhasil Memverifikasi Ujian', 'success');
        return redirect()->back();
    }


    public function bukti_dukung($id)
    {
        $file = Filebukti::where('id_ujian', $id)->get();
        $mahasiswa = Ujian::where('id', $id)->get();

        return view('staff.bukti_dukung', [
            'file' => $file,
            'mahasiswa' => $mahasiswa
        ]);
    }
}
