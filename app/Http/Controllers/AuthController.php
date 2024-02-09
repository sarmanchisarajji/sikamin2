<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            // User not found
            return back()->withErrors([
                'username' => 'Username atau Password salah',
            ])->onlyInput('username');
        }

        // Check if the user is active
        if ($user->is_aktif === 'n') {
            return back()->withErrors([
                'username' => 'Akun tidak aktif',
            ])->onlyInput('username');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->user_type === 'staff') {
                return redirect('staff/dashboard');
            } elseif (auth()->user()->user_type === 'mahasiswa') {
                return redirect('mahasiswa/dashboard');
            } else {
                return redirect('dosen/dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil Logout');
    }

    public function passwordMahasiswa(Request $request){
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
        ], [
            'old_password.required' => 'Kata sandi lama wajib diisi.',
            'new_password.required' => 'Kata sandi baru wajib diisi.',
            'new_password.min' => 'Kata sandi baru minimal terdiri dari 8 karakter.',
            'confirm_new_password.required' => 'Konfirmasi kata sandi baru wajib diisi.',
            'confirm_new_password.same' => 'Konfirmasi kata sandi baru harus sama dengan kata sandi baru.',
        ]);

        if (!Hash::check($validatedData['old_password'], $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Kata sandi lama salah.'])->withInput();
        }

        $user->password = Hash::make($validatedData['new_password']);
        $user->save();

        return redirect()->back()->with('success', 'Kata sandi berhasil diperbarui');
    }
}
