<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\StaffController;

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
        Route::get('/mahasiswa/pengajuan-ujian', [MahasiswaController::class, 'pengajuanUjian']);
        Route::get('/mahasiswa/pengajuan-ujian/tambah-ujian', [MahasiswaController::class, 'tambahUjian']);
        Route::get('/mahasiswa/monitoring-ujian', [MahasiswaController::class, 'monitoringUjian']);
    });

    // Route Dosen
    Route::middleware(['can:dosen'])->group(function () {
        Route::get('/dosen/dashboard', function () {
            return view('dosen.index');
        });
    });
});
