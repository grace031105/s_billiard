<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MejaRegulerController extends Controller
{
    public function index()
    {
        $mejaList = [
            ['no' => 1, 'gambar' => '/images/gambar4.jpeg'],
            ['no' => 2, 'gambar' => '/images/gambar4.jpeg'],
            ['no' => 3, 'gambar' => '/images/gambar4.jpeg'],
        ];

        return view('pages.meja_reguler', compact('mejaList'));
    }
}
