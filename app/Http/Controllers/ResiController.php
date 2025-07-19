<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\TransaksiPembayaran;
use Barryvdh\DomPDF\Facade\Pdf;

class ResiController extends Controller
{   
    public function index(Request $request)
    {
        $id = $request->get('id'); // Ambil ID dari query string
        $reservasi = \App\Models\Reservasi::with(['pelanggan', 'meja.kategori', 'transaksi'])
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
    public function show($id_transaksi)
    {
        
        $reservasiPertama = Reservasi::with(['pelanggan', 'meja.kategori', 'waktu', 'transaksi'])
            ->where('id_transaksi', $id_transaksi)->firstOrFail();
        $transaksi = TransaksiPembayaran::where('id_transaksi', $id_transaksi)->first();
        if (!$transaksi) {
            dd("Transaksi tidak ditemukan untuk ID transaksi: " . $id_transaksi);
        }
       

        $transaksi = $reservasiPertama->transaksi;
        if (!$transaksi) {
            dd("Transaksi tidak ditemukan untuk reservasi ID: " . $reservasiPertama->id_reservasi);
        }

        // Ambil semua reservasi lain dalam 1 transaksi
        $reservasiList = Reservasi::with(['pelanggan', 'meja.kategori', 'waktu'])
            ->where('id_transaksi', $id_transaksi)
            ->where('id_pelanggan', $reservasiPertama->id_pelanggan)
            ->get();
        if ($reservasiList->isEmpty()) {
            dd("Tidak ada reservasi dengan ID transaksi: " . $transaksi->id_transaksi);
        }
        $transaksi = $reservasiList->first()->transaksi;
        
        foreach ($reservasiList as $reservasi) {
            if ($reservasi->status !== 'dikonfirmasi') {
                abort(403, 'Salah satu reservasi belum dikonfirmasi.');
            }
        }
        return view('pages.resi_pemesanan', [
            'reservasiList' => $reservasiList,
            'transaksi' => $transaksi,
        ]);
    }


       public function downloadPDF($id)
        {
            $reservasiPertama = Reservasi::with(['pelanggan', 'meja.kategori', 'waktu', 'transaksi'])
                ->findOrFail($id);

            if ($reservasiPertama->status !== 'dikonfirmasi') {
                return abort(403, 'Reservasi belum dikonfirmasi.');
            }

            $transaksi = $reservasiPertama->transaksi;

            $reservasiList = Reservasi::with(['pelanggan', 'meja.kategori', 'waktu'])
                ->where('id_transaksi', $transaksi->id_transaksi)
                ->get();

            $pdf = Pdf::loadView('pages.resi_pdf', [
                'reservasiList' => $reservasiList,
                'transaksi' => $transaksi,
            ]);

            return $pdf->download('resi-pemesanan-' . $reservasiPertama->id_reservasi . '.pdf');
        }
}
