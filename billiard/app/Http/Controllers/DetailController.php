<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
   public function store(Request $request)
{
    return view('pages.details', [
        'nama' => auth()->guard('pelanggan')->check() ? auth()->guard('pelanggan')->user()->nama_pengguna : 'Guest',
        'email' => auth()->guard('pelanggan')->check() ? auth()->guard('pelanggan')->user()->email : 'guest@example.com',
        'tipe_meja' => $request->tipe_meja,
        'tanggal' => $request->tanggal,
        'jam' => $request->jam,
        'no_meja' => $request->no_meja,
        'subtotal' => $request->subtotal,
        'total_akhir' => $request->total_akhir,
    ]);
}


    }