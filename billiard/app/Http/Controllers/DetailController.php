<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        // Data dummy untuk testing
        $data = [
            'nama' => 'Joko Susilo',
            'email' => 'joko@example.com',
            'tipe_meja' => 'Meja VIP',
            'tanggal' => '2025-05-12',
            'jam' => '19:00',
            'no_meja' => 'A12',
            'subtotal' => 150000,
            'total_akhir' => 170000,
        ];

        return view('pages.details', $data);
    }
}
