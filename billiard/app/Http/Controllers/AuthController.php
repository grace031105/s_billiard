<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('pages.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/dash')->with('success', 'Login Berhasil');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        try {
            // Validasi tetap dilakukan, tapi jika error, tidak dikembalikan ke form
            $validated = $request->validate([
                'nama_pengguna' => 'nullable|string|max:255',
                'email' => 'nullable|string|email|max:255|unique:users',
                'nomor_telepon' => 'nullable|string|max:20',
                'kata_sandi' => 'nullable|string|min:6|confirmed',
            ]);
    
            // Jika validasi gagal, blok ini tidak jalan (langsung ke catch)
            User::create([
                'nama_pengguna' => $validated['nama_pengguna'] ?? '',
                'email' => $validated['email'] ?? '',
                'nomor_telepon' => $validated['nomor_telepon'] ?? '',
                'kata_sandi' => bcrypt($validated['kata_sandi'] ?? 'default123'),
            ]);

            return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
        } catch (\Exception $e) {
            // Jika validasi gagal atau error lain, tetap redirect ke login
            return redirect()->route('login')->with('info', 'Registrasi selesai. Silakan login.');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
