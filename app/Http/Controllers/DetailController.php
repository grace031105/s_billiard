<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Meja;
use App\Models\WaktuSewa;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function store(Request $request)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $subtotal = intval($request->subtotal);
        $total_akhir = $subtotal;
        $durasi = count(explode(',', $request->jam));

        $meja = Meja::where('nama_meja', $request->no_meja)->first();

        if (!$meja) {
            abort(500, 'Meja tidak ditemukan berdasarkan nama_meja.');
        }

        // Ambil satu rentang jam pertama dari list jam
        $jam_array = preg_split('/,\s*/', $request->jam);
        $rentang = explode('-', trim($jam_array[0]));

        $jam_mulai = date('H:i:s', strtotime(trim($rentang[0])));
        $jam_selesai = date('H:i:s', strtotime(trim($rentang[1])));

        $waktu = WaktuSewa::where('jam_mulai', $jam_mulai)
                          ->where('jam_selesai', $jam_selesai)
                          ->first();

        if (!$waktu) {
            abort(500, 'Waktu tidak ditemukan. Cek database waktu_sewa. Mulai: ' . $jam_mulai . ', Selesai: ' . $jam_selesai);
        }

        $reservasi = Reservasi::create([
            'id_pelanggan'      => $pelanggan->id_pelanggan,
            'id_pemilik'        => 1,
            'id_meja'           => $meja->id_meja,
            'id_waktu'          => $waktu->id_waktu,
            'tipe_meja'         => $meja->tipe_meja,
            'no_meja'           => $meja->nama_meja,
            'tanggal_reservasi' => $request->tanggal,
            'jam'               => $request->jam,
            'jumlah_orang'      => $request->jumlah_orang,
            'durasi_sewa'       => $durasi,
            'total_harga'       => $total_akhir,
            'status'            => 'menunggu_konfirmasi',
        ]);

        return view('pages.details', [
            'nama'              => $pelanggan->nama_pengguna,
            'email'             => $pelanggan->email,
            'tipe_meja'         => $meja->tipe_meja,
            'meja'              => $meja->nama_meja,
            'tanggal_reservasi' => $request->tanggal,
            'jam'               => $request->jam,
            'jumlah_orang'      => $request->jumlah_orang,
            'subtotal'          => $subtotal,
            'total_akhir'       => $total_akhir,
            'reservasi'         => $reservasi,
        ]);
    }
}
