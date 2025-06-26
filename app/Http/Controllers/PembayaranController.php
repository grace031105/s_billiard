<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Reservasi;
use App\Models\TransaksiPembayaran;

class PembayaranController extends Controller
{
    public function uploadBuktiPembayaran(Request $request, $id_reservasi)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'metode' => 'required|string'
        ]);

        $reservasi = Reservasi::findOrFail($id_reservasi);

        // Simpan file bukti pembayaran
        $file = $request->file('bukti_pembayaran');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('bukti_pembayaran', $namaFile, 'public');

        // Simpan data ke transaksi_pembayaran
        $transaksi = $reservasi->transaksi;
        if (!$transaksi) {
    $transaksi = new TransaksiPembayaran();
    $transaksi->id_reservasi = $reservasi->id_reservasi;
    $transaksi->id_pemilik = 1; // ✅ Tambahkan ini
}

        $transaksi->metode_pembayaran = $request->metode;
        $transaksi->bukti_pembayaran = $path;
        $transaksi->save();

        // Update status reservasi
        $reservasi->status = 'menunggu_konfirmasi';
        $reservasi->save();

        // Balik ke halaman sebelumnya dengan notif
        return redirect()->back()->with('status', 'Bukti pembayaran berhasil diunggah. Pembayaran sedang diproses.');
    }
}
