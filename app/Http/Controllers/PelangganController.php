<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function show()
    {
        $pelanggans = Pelanggan::all(); 
        return view('pages.kelola_pelanggan', compact('pelanggans')); // Kirim satu variabel array
    }
     
}



