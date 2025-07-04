<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Meja;

class BerandaController extends Controller
{
    public function index()
    {   
        $totalVIP = Meja::where('tipe_meja', 'vip')->count();
        $totalReguler = Meja::where('tipe_meja', 'reguler')->count();
        $totalPlatinum = Meja::where('tipe_meja', 'platinum')->count();

        return view('pages.beranda', [
            'totalVIP' => $totalVIP,
            'totalReguler' => $totalReguler,
            'totalPlatinum' => $totalPlatinum,
        ]);

        $notifikasiReservasi = Reservasi::with('pelanggan')
            ->where('status', 'menunggu_konfirmasi')
            ->get();

        return view('pages.beranda', compact('notifikasiReservasi'));
    }
}
