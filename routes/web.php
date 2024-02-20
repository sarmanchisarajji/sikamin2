<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\FilebuktiController;
use App\Http\Controllers\MahasiswaController;

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


        Route::get('/staff/monitoring_ujian/proposal', [StaffController::class, 'monitoring_proposal'])->name('s-m_proposal-index');
        Route::get('/staff/monitoring_ujian/hasil', [StaffController::class, 'monitoring_hasil'])->name('s-m_hasil-index');


        Route::get('/staff/verifikasi_ujian/proposal', [StaffController::class, 'verifikasi_ujian'])->name('s-v_proposal-index');
        Route::get('/staff/verifikasi_ujian/proposal/bukti_dukung/{id}', [StaffController::class, 'bukti_dukung'])->name('s-bukti_dukung');
        Route::put('/staff/verifikasi_ujian/proposal/bukti_dukung/update/{id}', [StaffController::class, 'update_status_ujian']);

        Route::view('/staff/verifikasi_ujian/proposal/surat_penunjukan_pembimbing', 'staff.draf.penunjukan_pembimbing')->name('s-penunjukan_pembimbing');
        Route::view('/staff/verifikasi_ujian/proposal/surat_tugas_ujian', 'staff.draf.tugas_ujian')->name('s-tugas_ujian');
        Route::view('/staff/verifikasi_ujian/proposal/berita_acara', 'staff.draf.berita_acara')->name('s-berita_acara');
        Route::view('/staff/verifikasi_ujian/proposal/surat_keterangan_ujian', 'staff.draf.keterangan_ujian')->name('s-keterangan_ujian');
        Route::view('/staff/verifikasi_ujian/proposal/lembar_penilaian', 'staff.draf.lembar_penilaian')->name('s-lembar_penilaian');
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
    });

    // Route Dosen
    Route::middleware(['can:dosen'])->group(function () {
        Route::get('/dosen/dashboard', function () {
            return view('dosen.index');
        });
    });
});
