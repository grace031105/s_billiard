<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservasi;
use App\Models\TransaksiPembayaran;
use App\Models\ResiPenyewaan;

class PembayaranController extends Controller
{
    public function uploadBuktiPembayaran(Request $request, $id_reservasi)
    {   
     

        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'metode' => 'required|string',
            'total_biaya' => 'required|numeric',
        ]);

        // Upload file
        $file = $request->file('bukti_pembayaran');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('bukti_pembayaran', $namaFile, 'public');

        $reservasi = Reservasi::find($id_reservasi);
        if (!$reservasi) {
            return back()->with('error', 'Data reservasi tidak ditemukan.');
        }
        // Buat transaksi hanya satu kali
        $transaksi = TransaksiPembayaran::where('id_transaksi', $reservasi->id_transaksi)->first();
        if (!$transaksi) {
            $transaksi = TransaksiPembayaran::create([
                'id_pelanggan' => Auth::guard('pelanggan')->id(),
                 'id_reservasi' => $reservasi->id_reservasi,
                'metode_pembayaran' => $request->metode,
                'bukti_pembayaran' => $path,
                'total_bayar' => $request->total_biaya,
                'status' => 'belum_dibayar',
                'id_pemilik' =>$reservasi->id_pemilik,
            ]);

            $reservasi->id_transaksi = $transaksi->id_transaksi;
            $reservasi->save();
        } else {
             $transaksi->update([
                'metode_pembayaran' => $request->metode,
                'bukti_pembayaran' => $path,
                'total_bayar' => $request->total_biaya,
                'status' => 'belum_dibayar',
            ]);
        }
        // Ambil semua reservasi milik pelanggan yang belum punya transaksi
        $reservasiList = Reservasi::with('meja.kategori')
            ->where('id_pelanggan', Auth::guard('pelanggan')->id())
            ->whereNull('id_transaksi')
            ->where('status', 'menunggu_konfirmasi')
            ->get();

        foreach ($reservasiList as $reservasi) {
            $reservasi->id_transaksi = $transaksi->id_transaksi;
            $reservasi->expired_at = $reservasi->expired_at ?? now()->addMinutes(2);
            $reservasi->status = 'menunggu_konfirmasi';
            $reservasi->save();

            // Buat resi per reservasi
            $tipeMeja = $reservasi->meja->kategori->nama_kategori ?? 'tidak_diketahui';

            
        }
        ResiPenyewaan::create([
                        'id_transaksi' => $transaksi->id_transaksi,
                        'tanggal_cetak' => now(),
                    ]);
        return redirect()->route('details')->with('popup', true);
    }
}
