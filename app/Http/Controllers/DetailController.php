<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Meja;
use App\Models\WaktuSewa;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiPembayaran;

class DetailController extends Controller
{
    public function store(Request $request)
{
    $pelanggan = Auth::guard('pelanggan')->user();

    // Cek apakah data dari keranjang (tanpa isian 'jam' atau 'no_meja') atau dari popup form
    if (!$request->has('jam') || !$request->has('no_meja')) {
        // ==== MODE KERANJANG ====
        $keranjang = session('keranjang', []);

        if (empty($keranjang)) {
            return redirect()->back()->withErrors(['Keranjang kosong.']);
        }

        $reservasiList = [];

        foreach ($keranjang as $item) {
            $meja = Meja::where('nama_meja', $item['no_meja'])->first();
            if (!$meja) continue;

            $jam_array = preg_split('/,\s*/', $item['jam']);
            $rentang = explode('-', trim($jam_array[0]));
            $jam_mulai = date('H:i:s', strtotime(trim($rentang[0])));
            $jam_selesai = date('H:i:s', strtotime(trim($rentang[1])));

            $waktu = WaktuSewa::where('jam_mulai', $jam_mulai)
                            ->where('jam_selesai', $jam_selesai)
                            ->first();

            $reservasi = Reservasi::create([
                'id_pelanggan'      => $pelanggan->id_pelanggan,
                'id_pemilik'        => $meja->id_pemilik ?? 1,
                'id_meja'           => $meja->id_meja,
                'id_waktu'          => $waktu->id_waktu ?? null,
                'tipe_meja'         => $meja->tipe_meja,
                'no_meja'           => $meja->nama_meja,
                'tanggal_reservasi' => $item['tanggal'],
                'jam'               => $item['jam'],
                'jumlah_orang'      => $item['jumlah_orang'],
                'durasi_sewa'       => count($jam_array),
                'total_harga'       => $item['subtotal'],
                'status'            => 'menunggu_konfirmasi',
            ]);
            $reservasiList[] = $reservasi;
        }

        session()->forget('keranjang');

        if (empty($reservasiList)) {
            return redirect()->back()->withErrors(['Gagal menyimpan reservasi dari keranjang.']);
        }

        return view('pages.details', [
            'nama'              => $pelanggan->nama_pengguna,
            'email'             => $pelanggan->email,
            //'tipe_meja'         => $dataTerakhir->tipe_meja,
            //'meja'              => $dataTerakhir->no_meja,
            //'tanggal_reservasi' => $dataTerakhir->tanggal_reservasi,
            //'jam'               => $dataTerakhir->jam,
            //'jumlah_orang'      => $dataTerakhir->jumlah_orang,
            //'subtotal'          => $total_akhir->total_harga,
            $total_biaya = array_sum(array_map(fn($r) => $r->total_harga, $reservasiList)),
            'reservasiList'     => $reservasiList,
            //'transaksi'         => TransaksiPembayaran::where('id_reservasi', $dataTerakhir->id_reservasi)->first(),
        ]);
    }

    // ==== MODE FORM POPUP ====
    $subtotal = intval($request->subtotal);
    $total_akhir = $subtotal;
    $durasi = count(explode(',', $request->jam));

    $meja = Meja::where('nama_meja', $request->no_meja)->first();

    if (!$meja) {
        abort(500, 'Meja tidak ditemukan berdasarkan nama_meja.');
    }

    $jam_array = preg_split('/,\s*/', $request->jam);
    $rentang = explode('-', trim($jam_array[0]));

    $jam_mulai = date('H:i:s', strtotime(trim($rentang[0])));
    $jam_selesai = date('H:i:s', strtotime(trim($rentang[1])));

    $waktu = WaktuSewa::where('jam_mulai', $jam_mulai)
                    ->where('jam_selesai', $jam_selesai)
                    ->first();

    if (!$waktu) {
        abort(500, 'Waktu tidak ditemukan. Cek waktu_sewa: ' . $jam_mulai . ' - ' . $jam_selesai);
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
        'transaksi'         => TransaksiPembayaran::where('id_reservasi', $reservasi->id_reservasi)->first(),
    ]);
}
}