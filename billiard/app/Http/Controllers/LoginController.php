<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller {
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        // Contoh login sederhana
        if ($username === 'admin' && $password === '123') {
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau password salah!');
        }
    }

    public function logout() {
        // Logika untuk logout
        return redirect('/login');
    }
}