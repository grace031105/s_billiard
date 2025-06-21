<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Models\WaktuSewa;
use App\Models\Reservasi;

class MejaRegulerController extends Controller
{
    // Contoh di controller MejaController
    public function index()
    {
        $meja_reguler = Meja::where('tipe_meja', 'reguler')->get();
        $waktu_sewas = WaktuSewa::all();

        $reservasiAktif = Reservasi::whereIn('status', ['menunggu_konfirmasi', 'dikonfirmasi', 'dibatalkan'])
                ->select('id_meja', 'tanggal_reservasi', 'id_waktu')
                ->get();

        $bookedMap = [];

        foreach ($reservasiAktif as $r) {
            $bookedMap[$r->id_meja][$r->tanggal_reservasi][] = $r->id_waktu;
        }
        return view('pages.meja_reguler', compact('meja_reguler', 'waktu_sewas', 'bookedMap'));
    }

}
