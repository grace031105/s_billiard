<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('pelanggan')->check()) {
            return redirect()->route('dash');
        }
        return view('pages.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'nama_pengguna' => 'required|string',
            'kata_sandi' => 'required|string'
        ]);

        $pelanggan = Pelanggan::where('nama_pengguna', $request->nama_pengguna)->first();

        if (!$pelanggan) {
            return back()->withErrors(['nama_pengguna' => 'Nama pengguna tidak ditemukan.']);
        }

        if (!Hash::check($request->kata_sandi, $pelanggan->kata_sandi)) {
            return back()->withErrors(['kata_sandi' => 'Kata sandi salah.']);
        }

        // Gunakan guard pelanggan untuk login
        Auth::guard('pelanggan')->login($pelanggan);
        $request->session()->regenerate();

        return redirect()->route('dash')->with('success', 'Login berhasil!');
    }

    public function showRegisterForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelanggan',
            'nomor_hp' => 'required|string|max:20',
            'kata_sandi' => 'required|string|min:6|confirmed',
        ]);

        Pelanggan::create([
            'nama_pengguna' => $validated['nama_pengguna'],
            'email' => $validated['email'],
            'nomor_hp' => $validated['nomor_hp'],
            'kata_sandi' => bcrypt($validated['kata_sandi']),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }


   public function logout(Request $request)
{
    Auth::guard('pelanggan')->logout(); // Guard pelanggan!
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('dash-public');
}
}