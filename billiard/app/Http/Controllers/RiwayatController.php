<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = [
            ['resi' => 'R001', 'tipe' => 'Reguler', 'tanggal' => '08-05-2025'],
            ['resi' => 'R002', 'tipe' => 'Platinum', 'tanggal' => '09-05-2025'],
            ['resi' => 'R003', 'tipe' => 'VIP', 'tanggal' => '10-05-2025'],
        ];
    
        return view('pages.riwayat_penyewaan', compact('riwayat'));
    }
    
}