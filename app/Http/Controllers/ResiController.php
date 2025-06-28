<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Barryvdh\DomPDF\Facade\Pdf;

class ResiController extends Controller
{   
    public function index(Request $request)
    {
        $id = $request->get('id'); // Ambil ID dari query string
        $reservasi = \App\Models\Reservasi::with(['pelanggan', 'meja', 'transaksi'])
            ->where('id_reservasi', $id)
            ->first();

        if (!$reservasi) {
            abort(404, 'Data reservasi tidak ditemukan.');
        }

        return view('pages.resi_pemesanan', [
            'reservasi' => $reservasi,
            'transaksi' => $reservasi->transaksi
        ]);
    }

        // Menampilkan halaman resi
        public function show($id)
        {
            $reservasi = Reservasi::with(['pelanggan', 'meja', 'waktu', 'transaksi'])->findOrFail($id);

            if ($reservasi->status !== 'dikonfirmasi') {
                return abort(403, 'Reservasi belum dikonfirmasi.');
            }

            return view('pages.resi_pemesanan', [
                'reservasi' => $reservasi,
                'transaksi' => $reservasi->transaksi,
            ]);
        }

        // Download PDF dari halaman resi
        public function downloadPDF($id)
        {
            $reservasi = Reservasi::with(['pelanggan', 'meja', 'waktu', 'transaksi'])->findOrFail($id);

            $pdf = Pdf::loadView('pages.resi_pdf', [
                'reservasi' => $reservasi,
                'transaksi' => $reservasi->transaksi,
            ]);

            return $pdf->download('resi-pemesanan-' . $reservasi->id_reservasi . '.pdf');
        }
}
