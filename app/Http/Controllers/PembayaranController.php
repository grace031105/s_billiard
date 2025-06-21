<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Reservasi;

class PembayaranController extends Controller
{
    public function konfirmasi(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_reservasi' => 'required|exists:reservasi,id_reservasi',
            'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Cari reservasi yang dimaksud
        $reservasi = Reservasi::findOrFail($request->id_reservasi);

        // Upload bukti pembayaran
        $path = $request->file('bukti')->store('bukti_pembayaran', 'public');

        // Simpan nama file ke kolom reservasi (pastikan kamu punya kolom bukti di tabel reservasi)
        $reservasi->bukti_pembayaran = $path;
        $reservasi->status = 'menunggu_verifikasi'; // Atau status sesuai logika kamu
        $reservasi->save();

        return redirect()->route('dash')->with('success', 'Bukti pembayaran berhasil diunggah! Tunggu konfirmasi dari pemilik.');
    }
}
