<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MejaPlatinumController extends Controller
{
    public function index()
    {
        $mejaList = [
            ['no' => 1, 'gambar' => '/images/gambar6.jpeg'],
            ['no' => 2, 'gambar' => '/images/gambar6.jpeg'],
            ['no' => 3, 'gambar' => '/images/gambar6.jpeg'],
        ];

        return view('pages.meja_platinum', compact('mejaList'));
    }
}
