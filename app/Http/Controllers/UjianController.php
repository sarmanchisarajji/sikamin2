<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Ujian;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UjianController extends Controller
{
    // MAHASISWA
    public function index()
    {
        $title = 'Menghapus Data!';
        $text = "Apakah yakin ingin menghapus data?";
        confirmDelete($title, $text);

        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $ujians = $mahasiswa->ujian;
        return view('mahasiswa.pengajuan-ujian', [
            'mahasiswa' => $mahasiswa,
            'ujians' => $ujians
        ]);
    }

    public function formUjianMahasiswa($id = null)
    {
        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $dosens = Dosen::all();
        $ujian = null;
        if (isset($id)) {
            $ujian = Ujian::findOrFail($id);
        }
        // dd($dosens);
        return view('mahasiswa.form-ujian', [
            'mahasiswa' => $mahasiswa,
            'dosens' => $dosens,
            'ujian' => $ujian
        ]);
    }

    public function storeUjianMahasiswa(Request $request)
    {
        $validatedData = $request->validate([
            'id_mahasiswa' => 'required',
            'judul' => 'required',
            'ipk_sementara' => 'required',
            'jenis_ujian' => 'required|in:hasil,proposal,skripsi',
            'id_pembimbing_1' => 'required',
            'id_pembimbing_2' => 'required|different:id_pembimbing_1',
        ], [
            'judul.required' => 'Judul penelitian harus diisi.',
            'ipk_sementara.required' => 'IPK sementara harus diisi.',
            'jenis_ujian.required' => 'Jenis ujian harus dipilih.',
            'id_pembimbing_1.required' => 'Pembimbing 1 harus dipilih.',
            'id_pembimbing_2.required' => 'Pembimbing 2 harus dipilih.',
            'id_pembimbing_2.different' => 'Pembimbing 2 harus berbeda dengan Pembimbing 1.',
        ]);

        Ujian::Create([
            'id_mahasiswa' => $validatedData['id_mahasiswa'],
            'judul' => $validatedData['judul'],
            'ipk_sementara' => $validatedData['ipk_sementara'],
            'jenis_ujian' => $validatedData['jenis_ujian'],
            'id_pembimbing_1' => $validatedData['id_pembimbing_1'],
            'id_pembimbing_2' => $validatedData['id_pembimbing_2'],
        ]);

        Alert::success('Data berhasil ditambahkan', session('success'));
        return redirect('mahasiswa/pengajuan-ujian');
        // return redirect('mahasiswa/pengajuan-ujian')->with('success','Data berhasil ditambahkan');
    }

    public function updateUjianMahasiswa(Request $request, $id)
    {
        $ujian = Ujian::findOrFail($id);
        $validatedData = $request->validate([
            'id_mahasiswa' => 'required',
            'judul' => 'required',
            'ipk_sementara' => 'required',
            'jenis_ujian' => 'required|in:hasil,proposal,skripsi',
            'id_pembimbing_1' => 'required',
            'id_pembimbing_2' => 'required|different:id_pembimbing_1',
        ], [
            'judul.required' => 'Judul penelitian harus diisi.',
            'ipk_sementara.required' => 'IPK sementara harus diisi.',
            'jenis_ujian.required' => 'Jenis ujian harus dipilih.',
            'id_pembimbing_1.required' => 'Pembimbing 1 harus dipilih.',
            'id_pembimbing_2.required' => 'Pembimbing 2 harus dipilih.',
            'id_pembimbing_2.different' => 'Pembimbing 2 harus berbeda dengan Pembimbing 1.',
        ]);

        $ujian->update([
            'id_mahasiswa' => $validatedData['id_mahasiswa'],
            'judul' => $validatedData['judul'],
            'ipk_sementara' => $validatedData['ipk_sementara'],
            'jenis_ujian' => $validatedData['jenis_ujian'],
            'id_pembimbing_1' => $validatedData['id_pembimbing_1'],
            'id_pembimbing_2' => $validatedData['id_pembimbing_2'],
        ]);

        Alert::success('Data berhasil diupdate', session('success'));
        return redirect('mahasiswa/pengajuan-ujian');
        // return redirect('mahasiswa/pengajuan-ujian')->with('success', 'Data berhasil diupdate');
    }
    // }

    public function deleteUjianMahasiswa($id)
    {
        $ujian = Ujian::findOrFail($id);
        $ujian->delete();

        Alert::success('Data berhasil dihapus', session('success'));
        return redirect('mahasiswa/pengajuan-ujian');
        // return redirect('mahasiswa/pengajuan-ujian')->with('success', 'Data berhasil dihapus');
    }

    public function monitoringUjianMahasiswa()
    {
        $mahasiswa = Mahasiswa::where('id_user', Auth::user()->id)->first();
        $ujians = $mahasiswa->ujian()
            ->whereIn('status', ['disetujui', 'selesai'])
            ->orderBy('tanggal_ujian', 'desc')
            ->get();
        return view('mahasiswa.monitoring-ujian', [
            'mahasiswa' => $mahasiswa,
            'ujians' => $ujians
        ]);
    }
}
