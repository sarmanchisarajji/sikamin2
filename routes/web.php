<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\FilebuktiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login/auth', [AuthController::class, 'auth']);

Route::middleware(['auth'])->group(function () {
    // Route Staff
    Route::middleware(['can:staff'])->group(function () {
        Route::get('/staff/profil', [StaffController::class, 'profil'])->name('s-profile');

        Route::get('/staff/dashboard', [StaffController::class, 'dashboard'])->name('s-dashboard');

        Route::get('/staff/mahasiswa', [StaffController::class, 'mahasiswa_index'])->name('s-mahasiswa-index');
        Route::get('/staff/mahasiswa/tambah', [StaffController::class, 'mahasiswa_create'])->name('s-mahasiswa-create');
        Route::post('/staff/mahasiswa/store', [StaffController::class, 'mahasiswa_store'])->name('s-mahasiswa-store');
        Route::get('/staff/mahasiswa/edit/{id}', [StaffController::class, 'mahasiswa_edit'])->name('s-mahasiswa-edit');
        Route::put('/staff/mahasiswa/update/{id}', [StaffController::class, 'mahasiswa_update'])->name('s-mahasiswa-update');
        Route::delete('/staff/mahasiswa/delete/{id}', [StaffController::class, 'mahasiswa_delete'])->name('s-mahasiswa-delete');


        Route::get('/staff/dosen', [StaffController::class, 'dosen_index'])->name('s-dosen-index');
        Route::get('/staff/dosen/tambah', [StaffController::class, 'dosen_create'])->name('s-dosen-create');
        Route::get('/staff/dosen/edit/{id}', [StaffController::class, 'dosen_edit'])->name('s-dosen-edit');
        Route::put('/staff/dosen/update/{id}', [StaffController::class, 'dosen_update'])->name('s-dosen-update');
        Route::post('/staff/dosen/store', [StaffController::class, 'dosen_store'])->name('s-dosen-store');
        Route::delete('/staff/dosen/delete/{id}', [StaffController::class, 'dosen_delete'])->name('s-dosen-delete');

        Route::get('/staff/monitoring_dosen', [StaffController::class, 'monitoring_dosen'])->name('s-m_dosen-index');


        Route::get('/staff/monitoring_ujian', [StaffController::class, 'monitoring_ujian'])->name('s-m_ujian-index');
        Route::get('/staff/monitoring_ujian/proposal', [StaffController::class, 'monitoring_proposal'])->name('s-m_proposal-index');
        Route::get('/staff/monitoring_ujian/hasil', [StaffController::class, 'monitoring_hasil'])->name('s-m_hasil-index');
        Route::get('/staff/monitoring_ujian/skripsi', [StaffController::class, 'monitoring_skripsi'])->name('s-m_skripsi-index');


        Route::get('/staff/verifikasi_ujian/proposal', [StaffController::class, 'verifikasi_proposal'])->name('s-v_proposal-index');
        Route::get('/staff/verifikasi_ujian/hasil', [StaffController::class, 'verifikasi_hasil'])->name('s-v_hasil-index');
        Route::get('/staff/verifikasi_ujian/skripsi', [StaffController::class, 'verifikasi_skripsi'])->name('s-v_skripsi-index');
        Route::get('/staff/verifikasi_ujian/proposal/bukti_dukung/{id}', [StaffController::class, 'bukti_dukung'])->name('s-bukti_dukung');
        Route::get('/staff/verifikasi_ujian/proposal/{id}', [StaffController::class, 'verifikasi_ujian_form'])->name('s-v_ujian_form');
        Route::put('/staff/verifikasi_ujian/proposal/update/{id}', [StaffController::class, 'verifikasi_ujian_update'])->name('s-v_ujian-update');


        Route::get('surat_berita_acara/{id}', [SuratController::class, 'surat_berita_acara'])->name('surat_berita_acara');
        Route::get('/staff/verifikasi_ujian/proposal/berita_acara/{id}', [SuratController::class, 'berita_acara_view'])->name('s-berita_acara_proposal');
        Route::get('/staff/verifikasi_ujian/hasil/berita_acara/{id}', [SuratController::class, 'berita_acara_view'])->name('s-berita_acara_hasil');
        Route::get('/staff/verifikasi_ujian/skripsi/berita_acara/{id}', [SuratController::class, 'berita_acara_view'])->name('s-berita_acara_skripsi');
        Route::put('/staff/verifikasi_ujian/proposal/berita_acara/update/{id}', [SuratController::class, 'berita_acara_update'])->name('s-berita_acara_update');

        Route::get('sk_pembimbing/{id}', [SuratController::class, 'sk_pembimbing'])->name('sk_pembimbing');
        Route::get('/staff/verifikasi_ujian/skripsi/sk_pembimbing/{id}', [SuratController::class, 'sk_pembimbing_view'])->name('s-sk_pembimbing');
        Route::put('/staff/verifikasi_ujian/skripsi/sk_pembimbing/update/{id}', [SuratController::class, 'sk_pembimbing_update'])->name('s-sk_pembimbing_update');
        
        Route::get('sk_penguji/{id}', [SuratController::class, 'sk_penguji'])->name('sk_penguji');
        Route::get('/staff/verifikasi_ujian/skripsi/sk_penguji/{id}', [SuratController::class, 'sk_penguji_view'])->name('s-sk_penguji');
        Route::put('/staff/verifikasi_ujian/skripsi/sk_penguji/update/{id}', [SuratController::class, 'sk_penguji_update'])->name('s-sk_penguji_update');

        Route::get('sk_penguji/{id}', [SuratController::class, 'sk_penguji'])->name('sk_penguji');
        Route::get('/staff/verifikasi_ujian/skripsi/sk_penguji/{id}', [SuratController::class, 'sk_penguji_view'])->name('s-sk_penguji');
        Route::put('/staff/verifikasi_ujian/skripsi/sk_penguji/update/{id}', [SuratController::class, 'sk_penguji_update'])->name('s-sk_penguji_update');

        Route::get('/staff/verifikasi_ujian/proposal/undangan/{id}', [SuratController::class, 'undangan_view'])->name('s-undangan_proposal');
        Route::get('/staff/verifikasi_ujian/hasil/undangan/{id}', [SuratController::class, 'undangan_view'])->name('s-undangan_hasil');
        Route::get('/staff/verifikasi_ujian/skripsi/undangan/{id}', [SuratController::class, 'undangan_view'])->name('s-undangan_skripsi');

        Route::put('/staff/verifikasi_ujian/proposal/undangan_proposal/update/{id}', [SuratController::class, 'undangan_update'])->name('s-undangan_update');
        Route::get('/staff/verifikasi_ujian/skripsi/berita_acara/{id}', [SuratController::class, 'berita_acara_skripsi_view'])->name('s-berita_acara_skripsi');
        Route::get('/staff/verifikasi_ujian/skripsi/lembar_penilaian/{id}', [SuratController::class, 'lembar_penilaian_view'])->name('s-lembar_penilaian');

        Route::get('surat_undangan/{id}', [SuratController::class, 'surat_undangan'])->name('surat_undangan');
        Route::get('lembar_penilaian/{id}', [SuratController::class, 'lembar_penilaian'])->name('lembar_penilaian');
        Route::get('berita_acara_skripsi/{id}', [SuratController::class, 'berita_acara_skripsi'])->name('berita_acara_skripsi');
    });

    // Route Mahasiswa
    Route::middleware(['can:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index']);

        // Profil
        Route::get('/mahasiswa/profil', [MahasiswaController::class, 'profil']);
        Route::put('/mahasiswa/profil/update-foto', [MahasiswaController::class, 'updateFotoProfil']);
        Route::put('/mahasiswa/profil/update-data', [MahasiswaController::class, 'updateDataProfil']);

        // Ganti Password
        Route::put('/mahasiswa/profil/ganti-password', [AuthController::class, 'passwordMahasiswa']);

        // Pengajuan Ujian
        Route::get('/mahasiswa/pengajuan-ujian', [UjianController::class, 'index']);
        Route::get('/mahasiswa/form-ujian/{id?}', [UjianController::class, 'formUjianMahasiswa']);
        Route::post('/mahasiswa/pengajuan-ujian/store', [UjianController::class, 'storeUjianMahasiswa']);
        Route::put('/mahasiswa/pengajuan-ujian/update/{id}', [UjianController::class, 'updateUjianMahasiswa']);
        Route::delete('/mahasiswa/pengajuan-ujian/delete/{id}', [UjianController::class, 'deleteUjianMahasiswa']);

        // File Bukti Pendukung
        Route::get('/mahasiswa/pengajuan-ujian/bukti-dukung/{id_ujian}', [FilebuktiController::class, 'indexMahasiswa']);
        Route::post('/mahasiswa/pengajuan-ujian/bukti-dukung/{id_ujian}/store', [FilebuktiController::class, 'storeBuktiMahasiswa']);
        Route::put('/mahasiswa/pengajuan-ujian/bukti-dukung/{id_ujian}/update/{id}', [FilebuktiController::class, 'updateBuktiMahasiswa']);
        Route::delete('/mahasiswa/pengajuan-ujian/bukti-dukung/{id_ujian}/delete/{id}', [FilebuktiController::class, 'deleteBuktiMahasiswa']);

        Route::get('/mahasiswa/monitoring-ujian', [UjianController::class, 'monitoringUjianMahasiswa']);
        Route::get('surat_berita_acara_mahasiswa/{id}', [UjianController::class, 'surat_berita_acara'])->name('surat_berita_acara_mahasiswa');
        Route::get('surat_undangan_mahasiswa/{id}', [UjianController::class, 'surat_undangan'])->name('surat_undangan_mahasiswa');
        Route::get('sk_pembimbing_mahasiswa/{id}', [UjianController::class, 'sk_pembimbing'])->name('sk_pembimbing_mahasiswa');
        Route::get('sk_penguji_mahasiswa/{id}', [UjianController::class, 'sk_penguji'])->name('sk_penguji_mahasiswa');
        Route::get('lembar_penilaian_mahasiswa/{id}', [UjianController::class, 'lembar_penilaian'])->name('lembar_penilaian_mahasiswa');
    });

    // Route Dosen
    Route::middleware(['can:dosen'])->group(function () {
        Route::get('/dosen/dashboard', function () {
            return view('dosen.index');
        });
    });
});
