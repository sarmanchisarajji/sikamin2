<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UjianController;
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
        Route::get('/staff/dashboard', [StaffController::class, 'index']);
    });

    // Route Mahasiswa
    Route::middleware(['can:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'index']);
        Route::get('/mahasiswa/profil', [MahasiswaController::class, 'profil']);

        Route::get('/mahasiswa/pengajuan-ujian', [UjianController::class, 'pengajuanUjianMahasiswa']);
        Route::get('/mahasiswa/form-ujian/{id?}', [UjianController::class, 'formUjianMahasiswa']);
        Route::post('/mahasiswa/pengajuan-ujian/store', [UjianController::class, 'storeUjianMahasiswa']);
        Route::put('/mahasiswa/pengajuan-ujian/update/{id}', [UjianController::class, 'updateUjianMahasiswa']);
        Route::delete('/mahasiswa/pengajuan-ujian/delete/{id}', [UjianController::class, 'deleteUjianMahasiswa']);

        Route::get('/mahasiswa/monitoring-ujian', [UjianController::class, 'monitoringUjianMahasiswa']);
    });

    // Route Dosen
    Route::middleware(['can:dosen'])->group(function () {
        Route::get('/dosen/dashboard', function () {
            return view('dosen.index');
        });
    });
});
