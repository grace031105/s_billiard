<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Meja;

class BerandaController extends Controller
{
    public function index()
    {   
        $totalVIP = Meja::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'vip');
        })->count();
        $totalReguler = Meja::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'reguler');
        })->count();
        $totalPlatinum = Meja::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'platinum');
        })->count();

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
