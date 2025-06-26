<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;

class BerandaController extends Controller
{
    public function index()
    {   
        $notifikasiReservasi = Reservasi::with('pelanggan')
            ->where('status', 'menunggu_konfirmasi')
            ->get();

        return view('pages.beranda', compact('notifikasiReservasi'));
    }
}
