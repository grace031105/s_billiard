<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class BerandaController extends Controller
{
    public function index()
    {   
        
        return view('pages.beranda');
    }
}
