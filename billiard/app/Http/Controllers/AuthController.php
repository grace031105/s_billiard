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
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // Menampilkan halaman register
    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nomor_telepon' => 'required|string|max:20',
            'kata_sandi' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'nama_pengguna' => $validated['nama_pengguna'],
            'email' => $validated['email'],
            'nomor_telepon' => $validated['nomor_telepon'],
            'kata_sandi' => bcrypt($validated['kata_sandi']),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
    // Logout
    public function logout(Request $request)
{
    Auth::logout(); // Logout user

    $request->session()->invalidate(); // Hapus sesi
    $request->session()->regenerateToken(); // Regenerasi token CSRF

    return redirect('/login'); // Redirect ke halaman login
}
}
?>