<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $meja = [
            ['src' => '/images/gambar4.jpeg', 'judul' => 'MEJA REGULER', 'link' => 'meja_reguler'],
            ['src' => '/images/gambar5.jpeg', 'judul' => 'MEJA VIP', 'link' => 'meja_vip'],
            ['src' => '/images/gambar6.jpeg', 'judul' => 'MEJA PLATINUM', 'link' => 'meja_platinum'],
        ];

        if (Auth::check()) {
            // Kalau sudah login → kirim juga data user-nya
            return view('pages.dash', [
                'meja' => $meja,
                'user' => Auth::user(),
            ]);
        } else {
            // Kalau belum login
            return view('pages.dash-public', compact('meja'));
        }
    }
}
