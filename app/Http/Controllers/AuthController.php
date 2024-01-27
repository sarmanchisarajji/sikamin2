<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
