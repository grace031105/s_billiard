<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPublicController extends Controller
{
    public function index()
{
    $meja = [
        ['src' => '/images/gambar4.jpeg', 'judul' => 'MEJA REGULER', 'link' => 'meja_reguler'],
        ['src' => '/images/gambar5.jpeg', 'judul' => 'MEJA VIP', 'link' => 'meja_vip'],
        ['src' => '/images/gambar6.jpeg', 'judul' => 'MEJA PLATINUM', 'link' => 'meja_platinum'],
    ];

    if (Auth::guard('pelanggan')->check()) {
        return view('pages.dash-public', [
            'meja' => $meja,
            'user' => Auth::guard('pelanggan')->user(),
        ]);
    } else {
        return view('pages.dash-public', compact('meja'));
    }
}
}