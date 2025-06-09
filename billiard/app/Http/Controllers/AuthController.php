<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;
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
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $pelanggan = Pelanggan::where('email', $request->email)->first();

    if ($pelanggan && \Hash::check($request->password, $pelanggan->kata_sandi)) {
        \Auth::login($pelanggan); // PAKAI INI agar middleware auth() jalan
        $request->session()->regenerate(); // regenerate session Laravel
        return redirect()->route('dash')->with('success', 'Login Berhasil');
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
        $validated = $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelanggan',
            'nomor_hp' => 'required|string|max:20',
            'kata_sandi' => 'required|string|min:6|confirmed',
        ]);

        \App\Models\Pelanggan::create([
            'nama_pengguna' => $validated['nama_pengguna'],
            'email' => $validated['email'],
            'nomor_hp' => $validated['nomor_hp'],
            'kata_sandi' => bcrypt($validated['kata_sandi']),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Terjadi kesalahan saat registrasi.');
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
