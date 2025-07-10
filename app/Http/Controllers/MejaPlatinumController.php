<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja; 
use App\Models\WaktuSewa;
use App\Models\Reservasi;
use Illuminate\Support\Str;

class MejaPlatinumController extends Controller
{
    public function index(Request $request)
    {
        $mejaList = Meja::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->where('nama_kategori', 'Platinum');})
        ->get(); // Ambil dari DB

        $mejaTerpilih = $request->query('meja'); 
        if ($mejaTerpilih) {
            $mejaObj = Meja::where('nama_meja', $mejaTerpilih)->first();
            $mejaTerpilihId = $mejaObj ? $mejaObj->id_meja : null;
        } else {
            $mejaTerpilihId = null;
        }
        $waktuList = WaktuSewa::all(); // ⬅️ Ambil semua jam dari DB
        $reservasiList = Reservasi::select('id_meja', 'tanggal_reservasi', 'id_waktu')
        ->whereIn('status', ['menunggu_konfirmasi', 'dikonfirmasi'])
        ->get();
    
    return view('pages.meja_platinum', compact(
        'mejaList',
        'mejaTerpilihId',
        'waktuList',
        'reservasiList'
    ));
    }
    public function cekJadwal(Request $request)
    {
        $tanggal = $request->tanggal;
        $noMeja = $request->no_meja;

        // Cari ID meja berdasarkan no_meja
        $meja = \App\Models\Meja::where('nama_meja', $noMeja)->first();

        if (!$meja) {
            return response()->json(['booked' => []]); // Jika meja tidak ditemukan
        }

        // Ambil semua ID waktu yang sudah dipesan untuk tanggal & meja ini
        $booked = Reservasi::where('id_meja', $meja->id_meja)
                    ->where('tanggal_reservasi', $tanggal)
                    ->pluck('id_waktu')
                    ->toArray();

        return response()->json(['booked' => $booked]);
    }

    // app/Http/Controllers/MejaPlatinumController.php

}
