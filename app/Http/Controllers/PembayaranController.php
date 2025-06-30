<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $reservasi = Reservasi::findOrFail($id_reservasi);

        // Upload file
        $file = $request->file('bukti_pembayaran');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('bukti_pembayaran', $namaFile, 'public');

        // Simpan transaksi baru atau update
        $transaksi = $reservasi->transaksi;
        if (!$transaksi) {
            $transaksi = new TransaksiPembayaran();
            $transaksi->id_reservasi = $reservasi->id_reservasi;
            $transaksi->id_pemilik = 1; // bisa diganti sesuai auth
        }

        $transaksi->metode_pembayaran = $request->metode;
        $transaksi->bukti_pembayaran = $path;
        $transaksi->total_bayar = $request->total_biaya;
        $transaksi->status = 'belum_dibayar';
        $transaksi->save();

        $kodeResi = 'RP' . str_pad($transaksi->id_transaksi, 3, '0', STR_PAD_LEFT);
        $tipeMeja = $reservasi->meja->tipe_meja ?? 'tidak_diketahui';

        ResiPenyewaan::create([
            'kode_resi' => $kodeResi,
            'id_transaksi' => $transaksi->id_transaksi,
            'tipe_meja' => $tipeMeja,
            'tanggal_cetak' => now(),
        ]);

        // Update status reservasi
        $reservasi->status = 'menunggu_konfirmasi';
        $reservasi->save();

        return redirect()->route('details')->with('popup', true);
    }

}
