<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MejaVipController extends Controller
{
    public function index()
    {
        $mejaList = [
            ['no' => 1, 'gambar' => '/images/gambar5.jpeg'],
            ['no' => 2, 'gambar' => '/images/gambar5.jpeg'],
            ['no' => 3, 'gambar' => '/images/gambar5.jpeg'],
        ];

        return view('pages.meja_vip', compact('mejaList'));
    }
}
