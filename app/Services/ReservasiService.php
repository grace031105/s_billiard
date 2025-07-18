<?php

namespace App\Services;

use App\Models\Reservasi;
use App\Models\TransaksiPembayaran;
use App\Models\ResiPenyewaan;
use App\Models\Meja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservasiService
{
    public function simpan(array $data)
    {
        return DB::transaction(function () use ($data) {
            // Ambil meja untuk mengetahui siapa pemiliknya
            $meja = Meja::findOrFail($data['id_meja']);

            $reservasi = Reservasi::create([
                'id_pelanggan' => Auth::guard('pelanggan')->id(),   // pelanggan yang login
                'id_pemilik'   => $meja->id_pemilik,                // ambil dari data meja
                'id_meja'      => $data['id_meja'],
                'id_waktu'     => $data['id_waktu'],
                'tanggal'      => $data['tanggal'],
                'expired_at'   => $data['expired_at'],
            ]);

            TransaksiPembayaran::create([
                'id_reservasi' => $reservasi->id_reservasi,
            ]);

            ResiPenyewaan::create([
                'id_reservasi' => $reservasi->id_reservasi,
            ]);

            return $reservasi;
        });
    }

}
