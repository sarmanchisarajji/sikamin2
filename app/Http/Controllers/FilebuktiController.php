<?php

namespace App\Http\Controllers;

use App\Models\Filebukti;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FilebuktiController extends Controller
{
    public function indexMahasiswa($id_ujian)
    {
        $title = 'Menghapus Data!';
        $text = "Apakah yakin ingin menghapus data?";
        confirmDelete($title, $text);

        $buktis = Filebukti::where('id_ujian', $id_ujian)->get();
        $ujian = Ujian::findOrFail($id_ujian);
        return view('mahasiswa.bukti-dukung', [
            'buktis' => $buktis,
            'jenis_ujian' => $ujian->jenis_ujian,
            'id_ujian' => $id_ujian
        ]);
    }

    public function storeBuktiMahasiswa(Request $request, $id_ujian)
    {
        $validatedData = $request->validate(
            [
                'nama_berkas' => 'required',
                'file' => 'required|file|mimes:doc,docx,xls,xlsx,pdf|max:1024'
            ],
            [
                'nama_berkas.required' => 'Nama berkas tidak boleh kosong',
                'file.required' => 'File tidak boleh kosong',
                'file.mimes' => 'File harus berupa doc, docx, xls, xlsx, atau pdf',
                'file.max' => 'File maksimal berukuran 1 MB'
            ]
        );

        // dd($validatedData);

        $file = $request->file('file')->store('file-bukti');
        $post = Filebukti::create([
            'nama_berkas' => $validatedData['nama_berkas'],
            'file' => $file,
            'id_ujian' => $id_ujian
        ]);

        $ujian = Ujian::findOrFail($id_ujian);
        if ($ujian->status == 'dikembalikan') {
            $ujian->update([
                'status' => 'diajukan',
                'catatan' => null
            ]);
        }

        if ($post) {
            Alert::success('Data berhasil ditambahkan', session('success'));
            return redirect("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian");
            // return redirect("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian")->with('success','Data berhasil ditambahkan');
        } else {
            return redirect("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian")->with('error', 'Data gagal ditambahkan, periksa kembali file yang Anda masukan maksimal harus berukuran 1 MB');
        }
    }

    public function updateBuktiMahasiswa(Request $request, $id_ujian, $id)
    {
        $bukti = FIlebukti::findOrFail($id);
        $file = $bukti->file;

        $validatedData = $request->validate([
            'nama_berkas' => 'required',
            'file' => 'file|mimes:doc,docx,xls,xlsx,pdf|max:1024'
        ], [
            'nama_berkas.required' => 'Nama berkas tidak boleh kosong',
            'file.mimes' => 'File harus berupa doc, docx, xls, xlsx, atau pdf',
            'file.max' => 'File maksimal berukuran 1 MB'
        ]);

        if ($request->file('file')) {
            Storage::delete($bukti->file);
            $file = $request->file('file')->store('file-bukti');
        };

        $bukti->update([
            'nama_berkas' => $validatedData['nama_berkas'],
            'file' => $file,
        ]);

        $ujian = Ujian::findOrFail($id_ujian);
        if ($ujian->status == 'dikembalikan') {
            $ujian->update([
                'status' => 'diajukan',
                'catatan' => null
            ]);
        }

        Alert::success('Data berhasil diupdate', session('success'));
        return redirect("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian");
        // return redirect("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian")->with('success','Data berhasil diupdate');
    }

    public function deleteBuktiMahasiswa($id_ujian, $id)
    {
        $bukti = Filebukti::findOrFail($id);

        // Hapus file terkait dari penyimpanan
        Storage::delete($bukti->file);

        $bukti->delete();

        Alert::success('Data berhasil dihapus', session('success'));
        return redirect("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian");
        // return redirect("mahasiswa/pengajuan-ujian/bukti-dukung/$id_ujian")->with('success', 'Data berhasil dihapus');
    }
}
