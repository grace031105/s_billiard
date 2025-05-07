<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResiController extends Controller
{
    public function index()
    {

        return view('resipemesanan', compact('resipemesanan'));
    }
}