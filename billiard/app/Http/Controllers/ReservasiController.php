<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function show()
    {
        $reservasih = Reservasi::all(); // Ambil semua data dari tabel 'meja'
        return view('pages.reservasi', compact('reservasih')); // Kirim satu variabel array
    }
    
}
