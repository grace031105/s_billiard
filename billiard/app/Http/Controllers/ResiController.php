<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResiController extends Controller
{
    public function index()
    {
        // $showresi = [
        //    ['id' => 'RESI001'], 
        //    ['nama' => 'Budi'],
        //    ['tipe_meja' => 'VIP'],
        //    ['no_meja' => '4'],
        //    ['tanggal' => '2025-05-06'],
        //    ['waktu' => '15:00 - 17:00'],
        //    ['total_harga' => 'Rp 100.000'],
        // ]; -->
        return view('pages.resi_pemesanan');
    }
}
