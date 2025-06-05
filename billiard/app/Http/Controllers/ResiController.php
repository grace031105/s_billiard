<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\ResiPenyewaan;

class ResiController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'id_resi' => 1,
            'kode_resi' => 'RESI001',
            'nama_pelanggan' => 'Budi',
            'tipe_meja' => 'VIP',
            'no_meja' => 4,
            'tanggal' => '2025-05-06',
            'waktu' => '15:00 - 17:00',
            'total_harga' => 'Rp 100.000',
        ];

        return view('pages.resi_pemesanan', compact('data'));
    }
    public function downloadPDF($id)
{
    $data = ResiPenyewaan::findOrFail($id);

    $pdf = Pdf::loadView('resi-pdf', ['data' => $data]);
    return $pdf->download('resi-penyewaan-'.$data->id.'.pdf');
}
}
