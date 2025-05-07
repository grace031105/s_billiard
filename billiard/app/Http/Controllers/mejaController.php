<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {

        return view('meja_reguler', compact('meja_reguler'));
        return view('meja_vip', compact('meja_vip'));
        return view('meja_platinum', compact('meja_platinum'));
    }
}
