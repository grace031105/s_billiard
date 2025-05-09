<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $meja = [
            ['src' => '/images/gambar4.jpeg', 'judul' => 'MEJA REGULER', 'link' => 'meja_reguler'],
            ['src' => '/images/gambar5.jpeg', 'judul' => 'MEJA VIP', 'link' => 'meja_vip'],
            ['src' => '/images/gambar6.jpeg', 'judul' => 'MEJA PLATINUM', 'link' => 'meja_platinum'],
        ];
        return view('pages.dash', compact('meja'));
    }
}
