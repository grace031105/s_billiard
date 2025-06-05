<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\ResiPenyewaan;
use Barryvdh\DomPDF\Facade\Pdf;


class ResiController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->get('id', 1); // default id = 1
        $data = ResiPenyewaan::find(1);

        return view('pages.resi_pemesanan', compact('data'));
    }
    public function downloadPDF($id)
    {
    $data = ResiPenyewaan::find(1);
    $pdf = Pdf::loadView('pages.resi-pdf', ['data' => $data]);
    return $pdf->download('pages.resi-penyewaan-'.$data->id.'.pdf');
    }
}
