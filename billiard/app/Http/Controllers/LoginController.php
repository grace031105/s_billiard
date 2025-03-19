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
            return "Login berhasil!";
        } else {
            return "Username atau password salah!";
        }
    }
}