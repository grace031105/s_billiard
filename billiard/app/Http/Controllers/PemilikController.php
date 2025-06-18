<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.pemilik'); // view login khusus pemilik
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'kata_sandi' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->kata_sandi,
        ];

        if (Auth::guard('pemilik')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('beranda'); // ganti sesuai halaman utama pemilik
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('pemilik')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/pemilik'); // kembali ke halaman login pemilik
    }

}
