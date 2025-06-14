<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function show()
    {
       $reservasih = Reservasi::with(['pelanggan', 'meja', 'waktu', 'transaksi'])->get();
        return view('pages.reservasi', compact('reservasih')); // Kirim satu variabel array
    }
    public function konfirmasi($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = 'dikonfirmasi';
        $reservasi->save();

        return redirect()->back()->with('success', 'Reservasi berhasil dikonfirmasi.');
    }

    public function batal($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = 'dibatalkan';
        $reservasi->save();

        return redirect()->back()->with('success', 'Reservasi berhasil dibatalkan.');
    }

}
