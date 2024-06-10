<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Ujian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
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
            'sk_pembimbing' => 'nullable|file|mimes:pdf|max:1024',

        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        if ($req->hasFile('sk_pembimbing')) {
            $file = $req->file('sk_pembimbing');
            $fileName = 'SK Pembimbing ' . $ujian->mahasiswa->nama . '.' . $file->getClientOriginalExtension();
            $file->storeAs($ujian->jenis_ujian . '/' . $ujian->mahasiswa->nama . '/', $fileName);
            $ujian->sk_pembimbing = $fileName;
        }
        $ujian->no_sk_pembimbing = $req->input('no_surat');
        $ujian->save();

        toast('Berhasil Melengkapi Undangan Proposal', 'success');
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
            'sk_penguji' => 'nullable|file|mimes:pdf|max:1024',

        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        if ($req->hasFile('sk_penguji')) {
            $file = $req->file('sk_penguji');
            $fileName = 'SK Penguji ' . $ujian->mahasiswa->nama . '.' . $file->getClientOriginalExtension();
            $file->storeAs($ujian->jenis_ujian . '/' . $ujian->mahasiswa->nama . '/', $fileName);
            $ujian->sk_penguji = $fileName;
        }
        $ujian->no_sk_penguji = $req->input('no_surat');
        $ujian->save();

        toast('Berhasil Melengkapi Undangan Proposal', 'success');
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
            'ba' => 'nullable|file|mimes:pdf|max:1024',
        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        if ($req->hasFile('ba')) {
            $file = $req->file('ba');
            $fileName = 'Berita Acara ' . $ujian->mahasiswa->nama . '.' . $file->getClientOriginalExtension();
            $file->storeAs($ujian->jenis_ujian . '/' . $ujian->mahasiswa->nama . '/', $fileName);
            $ujian->ba = $fileName;
        }
        $ujian->plhplt = $req->input('plhplt');
        $ujian->nama_ttd = $req->input('nama_ttd');
        $ujian->save();

        toast('Berhasil Melengkapi Berita Acara', 'success');
        return redirect()->back();
    }

    // sk dekan
    public function sk_dekan_view($id)
    {
        $ujian = Ujian::find($id);
        return view('staff.draf.sk_dekan', [
            'ujian' => $ujian,
        ]);
    }
    
    public function sk_dekan_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'sk_dekan' => 'nullable|file|mimes:pdf|max:1024',
        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        $file = $ujian->sk_dekan;
        if ($req->file('sk_dekan')) {
            if($file){
                Storage::delete($ujian->sk_dekan);
            }
            $fileName = 'SK Dekan ' . $ujian->mahasiswa->nama . '.' . $req->file('sk_dekan')->getClientOriginalExtension();
            $file = $req->file('sk_dekan')->storeAs('sk_dekan', $fileName);
        };

        $ujian->update([
            'sk_dekan' => $file
        ]);
       
        toast('Berhasil Melengkapi SK Dekan', 'success');
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
            'undangan' => 'nullable|file|mimes:pdf|max:1024',

        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        if ($req->hasFile('undangan')) {
            $file = $req->file('undangan');
            $fileName = 'Undangan ' . $ujian->mahasiswa->nama . '.' . $file->getClientOriginalExtension();
            $file->storeAs($ujian->jenis_ujian . '/' . $ujian->mahasiswa->nama . '/', $fileName);
            $ujian->undangan = $fileName;
        }
        $ujian->no_surat_undangan = $req->input('no_surat');
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

    public function lembar_penilaian_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'lembar_penilaian' => 'nullable|file|mimes:pdf|max:1024',

        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        if ($req->hasFile('lembar_penilaian')) {
            $file = $req->file('lembar_penilaian');
            $fileName = 'Lembar Penilaian ' . $ujian->mahasiswa->nama . '.' . $file->getClientOriginalExtension();
            $file->storeAs($ujian->jenis_ujian . '/' . $ujian->mahasiswa->nama . '/', $fileName);
            $ujian->lembar_penilaian = $fileName;
        }
        $ujian->save();

        toast('Berhasil Melengkapi Undangan Proposal', 'success');
        return redirect()->back();
    }

    public function berita_acara_skripsi($id)
    {
        $ujian = Ujian::with('mahasiswa')->find($id);
        $ttd = Dosen::where('jabatan_akademik', 'kajur')
            ->orWhere('jabatan_akademik', 'sekjur')
            ->get();
        $pdf = PDF::loadView('/staff/surat/berita_acara_skripsi', [
            'ujian' => $ujian,
            'ttd' => $ttd,
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
        $dosen = Dosen::all();
        return view('staff.draf.berita_acara_skripsi', [
            'ujian' => $ujian,
            'ttd' => $ttd,
            'dosen' => $dosen
        ]);
    }

    public function berita_acara_skripsi_update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'plhplt' => 'nullable|string',
            'nama_ttd' => 'nullable|string',
            'ba' => 'nullable|file|mimes:pdf|max:1024',

        ]);

        $ujian = Ujian::where('id', $id)->with('mahasiswa')->firstOrFail();
        if ($req->hasFile('ba')) {
            $file = $req->file('ba');
            $fileName = 'Berita Acara ' . $ujian->mahasiswa->nama . '.' . $file->getClientOriginalExtension();
            $file->storeAs($ujian->jenis_ujian . '/' . $ujian->mahasiswa->nama . '/', $fileName);
            $ujian->ba = $fileName;
        }
        $ujian->plhplt = $req->input('plhplt');
        $ujian->nama_ttd = $req->input('nama_ttd');
        $ujian->save();

        toast('Berhasil Melengkapi Undangan Proposal', 'success');
        return redirect()->back();
    }
}
