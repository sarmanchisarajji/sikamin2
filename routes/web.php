<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
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

Route::get('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('login/auth', [AuthController::class, 'auth']);

Route::middleware(['auth'])->group(function () {
    // Route Staff
    Route::middleware(['can:staff'])->group(function () {
        Route::get('/staff/dashboard', [StaffController::class, 'index']);
    });

    // Route Mahasiswa
    Route::middleware(['can:mahasiswa'])->group(function () {
        Route::get('/mahasiswa/dashboard', function () {
            return view('mahasiswa.index');
        });
    });

    // Route Dosen
    Route::middleware(['can:dosen'])->group(function () {
        Route::get('/dosen/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
        Route::get('/dosen/mahasiswa-bimbingan/list', [DosenController::class, 'mahasiswaBimbinganList'])->name('dosen.mahasiswa_bimbingan.list');
    });
});
