<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Ujian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    // SK PEMBIMBING
    public function sk_pembimbing($id)
    {
        $ujian = Ujian::with('mahasiswa')->find($id);
        $pdf = PDF::loadView('/staff/surat/sk_pembimbing', [
            'ujian' => $ujian
        ]);
        $pdf->setPaper('legal', 'portrait');

        return $pdf->stream();
    }

    public function sk_pembimbing_view($id)
    {
        $ujian = Ujian::find($id);
        $ttd = Dosen::where('jabatan_akademik', 'kajur')
            ->orWhere('jabatan_akademik', 'sekjur')
            ->get();
        return view('staff.draf.sk_pembimbing', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
    }

    public function sk_pembimbing_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'no_surat' => 'nullable|string',
        ]);

        $ujian = Ujian::where('id', $id)->firstOrFail();
        $ujian->no_sk_pembimbing = $req->input('no_surat');
        $ujian->save();

        toast('Berhasil Melengkapi SK Pembimbing', 'success');
        return redirect()->back();
    }
    // SK PEMBIMBING

    // SK PENGUJI
    public function sk_penguji_view($id)
    {
        $ujian = Ujian::find($id);
        $ttd = Dosen::where('jabatan_akademik', 'kajur')
        ->orWhere('jabatan_akademik', 'sekjur')
        ->get();
        return view('staff.draf.sk_penguji', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
    }

    public function sk_penguji($id)
    {
        $ujian = Ujian::with('mahasiswa')->find($id);
        $ttd = Dosen::where('jabatan_akademik', 'sekjur')
        ->get();
        $pdf = PDF::loadView('/staff/surat/sk_penguji', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream();
    }

    public function sk_penguji_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'no_surat' => 'nullable|string',
        ]);

        $ujian = Ujian::where('id', $id)->firstOrFail();
        $ujian->no_sk_penguji = $req->input('no_surat');
        $ujian->save();

        toast('Berhasil Melengkapi SK Penguji', 'success');
        return redirect()->back();
    }    
    // SK PENGUJI

    public function berita_acara_view($id)
    {
        $ujian = Ujian::find($id);
        $ttd = Dosen::where('jabatan_akademik', 'kajur')
            ->orWhere('jabatan_akademik', 'sekjur')
            ->get();
        return view('staff.draf.berita_acara', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
    }
    public function surat_berita_acara($id)
    {
        $ujian = Ujian::with('mahasiswa')->find($id);
        $ttd = Dosen::where('jabatan_akademik', 'kajur')
            ->orWhere('jabatan_akademik', 'sekjur')
            ->get();
        $pdf = PDF::loadView('/staff/surat/berita_acara', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
        $pdf->setPaper('legal', 'portrait');

        return $pdf->stream();
    }

    public function berita_acara_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'no_surat' => 'nullable|string',
            'nama_ttd' => 'required|string',
            'ba' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        if ($req->hasFile('ba')) {
            $file = $req->file('ba');
            $fileName = $ujian->mahasiswa->nama . '.' . $file->getClientOriginalExtension();

            $file->storeAs('berita-acara/proposal', $fileName);
            $ujian->ba = $fileName;
        }
        $ujian->plhplt = $req->input('plhplt');
        $ujian->nama_ttd = $req->input('nama_ttd');
        $ujian->save();

        toast('Berhasil Melengkapi Berita Acara', 'success');
        return redirect()->back();
    }

    public function undangan_view($id)
    {
        $ujian = Ujian::find($id);
        $ttd = Dosen::where('jabatan_akademik', 'sekjur')
            ->orWhere('jabatan_akademik', 'sekjur')
            ->get();
        return view('staff.draf.undangan_proposal', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
    }

    public function surat_undangan($id)
    {
        $ujian = Ujian::with('mahasiswa')->find($id);
        $ttd = Dosen::where('jabatan_akademik', 'sekjur')
            ->get();
        $pdf = PDF::loadView('/staff/surat/undangan_proposal', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
        $pdf->setPaper('legal', 'portrait');

        return $pdf->stream();
    }

    public function undangan_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'no_surat' => 'nullable|string',
        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        if ($req->hasFile('ba')) {
            $file = $req->file('ba');
            $fileName = $ujian->mahasiswa->nama . '.' . $file->getClientOriginalExtension();

            $file->storeAs('undangan/proposal', $fileName);
            $ujian->ba = $fileName;
        }
        $ujian->no_sp = $req->input('no_surat');
        $ujian->save();

        toast('Berhasil Melengkapi Undangan Proposal', 'success');
        return redirect()->back();
    }


    
    public function lembar_penilaian($id)
    {
        $ujian = Ujian::with('mahasiswa')->find($id);
        $ttd = Dosen::where('jabatan_akademik', 'sekjur')
            ->get();
        $pdf = PDF::loadView('/staff/surat/lembar_penilaian', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream();
    }

    public function lembar_penilaian_view($id)
    {
        $ujian = Ujian::find($id);
        $ttd = Dosen::where('jabatan_akademik', 'kajur')
            ->orWhere('jabatan_akademik', 'sekjur')
            ->get();
        return view('staff.draf.lembar_penilaian', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
    }

    public function berita_acara_skripsi($id)
    {
        $ujian = Ujian::with('mahasiswa')->find($id);
        $pdf = PDF::loadView('/staff/surat/berita_acara_skripsi', [
            'ujian' => $ujian,
        ]);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream();
    }

    public function berita_acara_skripsi_view($id)
    {
        $ujian = Ujian::find($id);
        $ttd = Dosen::where('jabatan_akademik', 'kajur')
            ->orWhere('jabatan_akademik', 'sekjur')
            ->get();
        return view('staff.draf.berita_acara_skripsi', [
            'ujian' => $ujian,
            'ttd' => $ttd
        ]);
    }
}
