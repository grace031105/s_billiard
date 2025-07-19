<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Meja;
use App\Models\WaktuSewa;
use Illuminate\Support\Facades\Auth;
use App\Models\TransaksiPembayaran;
use Carbon\Carbon;


class DetailController extends Controller
{
    public function store(Request $request)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        // Cek apakah data dari keranjang (tanpa isian 'jam' atau 'no_meja') atau dari popup form
        if (!$request->has('jam') || !$request->has('no_meja')) {
            // ==== MODE KERANJANG (dibatasi hanya 1 reservasi) ====
            $keranjang = session('keranjang', []);

            if (empty($keranjang)) {
                return redirect()->back()->withErrors(['Keranjang kosong.']);
            }

            $reservasiList = [];
            foreach ($keranjang as $item) {
            $meja = Meja::where('nama_meja', $item['no_meja'])->first();
            if (!$meja) {
                return redirect()->back()->withErrors(['Meja tidak ditemukan.']);
            }
            $kategori = $meja->kategori;
            if (!$kategori) {
                return redirect()->back()->withErrors(['Kategori meja tidak ditemukan.']);
            }
            $hargaPerJam = $kategori->harga_default;
            $tipeMeja = $kategori->nama_kategori;
            $jam_array = preg_split('/,\s*/', $item['jam']);
            $durasi = count($jam_array);
            $totalHarga = $durasi * $hargaPerJam;

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
                //'tipe_meja'         => $tipeMeja,
                //'no_meja'           => $meja->nama_meja,
                //'id_transaksi'      => $transaksi->id_transaksi,
                'tanggal_reservasi' => $item['tanggal'],
                'jam'               => implode(', ', $jam_array),
                'durasi_sewa'       => count($jam_array),
                'total_harga'       => $totalHarga,
                'status'            => 'menunggu_konfirmasi',
                'expired_at'        => \Carbon\Carbon::now()->addMinutes(2),
            ]);
            $reservasi = Reservasi::with('meja.kategori')->find($reservasi->id_reservasi);
            $reservasiList[] = $reservasi;
        }

            session()->forget('keranjang');
            return view('pages.details', [
                'nama'              => $pelanggan->nama_pengguna,
                'email'             => $pelanggan->email,
                'reservasiList'     => $reservasiList,
            ]);
        }

        // ==== MODE FORM POPUP ====
        if (!$request->jam || !str_contains($request->jam, '-')) {
    return redirect()->back()->withErrors(['Jam belum dipilih atau format tidak valid.']);
}

$jam_array = preg_split('/,\s*/', $request->jam);

// Validasi jam format benar
$rentang = explode('-', trim($jam_array[0]));
if (count($rentang) < 2) {
    return redirect()->back()->withErrors(['Format jam tidak valid.']);
}

$jam_mulai = date('H:i:s', strtotime(trim($rentang[0])));
$jam_selesai = date('H:i:s', strtotime(trim($rentang[1])));
        //$subtotal = intval($request->subtotal);
        //$total_akhir = $subtotal;
        $durasi = count(explode(',', $request->jam));

        $meja = Meja::where('nama_meja', $request->no_meja)->first();
        if (!$meja) {
            abort(500, 'Meja tidak ditemukan berdasarkan nama_meja.');
        }
        $kategori = $meja->kategori;
        if (!$kategori) {
            return redirect()->back()->withErrors(['Kategori meja tidak ditemukan.']);
        }
        $hargaPerJam = $kategori->harga_default;
        $tipeMeja = $kategori->nama_kategori;
        $jam_array = preg_split('/,\s*/', $request->jam);
        $durasi = count($jam_array);
        $totalHarga = $durasi * $hargaPerJam;


        
        $rentang = explode('-', trim($jam_array[0]));
        $jam_mulai = date('H:i:s', strtotime(trim($rentang[0])));
        $jam_selesai = date('H:i:s', strtotime(trim($rentang[1])));

        $waktu = WaktuSewa::where('jam_mulai', $jam_mulai)
            ->where('jam_selesai', $jam_selesai)
            ->first();

        foreach ($jam_array as $jam) {
            $rentang = explode('-', trim($jam));
            if (count($rentang) < 2) continue;

            $jamMulai = date('H:i:s', strtotime(trim($rentang[0])));
            $jamSelesai = date('H:i:s', strtotime(trim($rentang[1])));

            $waktuSewa = WaktuSewa::where('jam_mulai', $jamMulai)
                ->where('jam_selesai', $jamSelesai)
                ->first();

            if (!$waktuSewa) continue;

            $cek = Reservasi::where('id_meja', $meja->id_meja)
                ->where('tanggal_reservasi', $request->tanggal)
                ->where('id_waktu', $waktuSewa->id_waktu)
                 ->whereIn('status', ['menunggu_konfirmasi', 'dikonfirmasi']) 
                ->exists();

            if ($cek) {
                return redirect()->back()->withErrors([
                    "Meja {$meja->nama_meja} sudah dipesan pada jam $jam."
                ]);
            }       
}

        try {
            $reservasi = Reservasi::create([
                'id_pelanggan'      => $pelanggan->id_pelanggan,
                'id_pemilik'        => 1,
                'id_meja'           => $meja->id_meja,
                'id_waktu'          => $waktu->id_waktu,
                //'tipe_meja'         => $tipeMeja,
                //'no_meja'           => $meja->nama_meja,
                'tanggal_reservasi' => $request->tanggal,
                'jam'               => implode(', ', $jam_array),
                'durasi_sewa'       => $durasi,
                'total_harga'       => $totalHarga,
                'status'            => 'menunggu_konfirmasi',
                'expired_at'        => \Carbon\Carbon::now()->addMinutes(2),
            ]);
        } catch (\Exception $e) {
            dd('Gagal simpan:', $e->getMessage());
        }
        $reservasi = Reservasi::with('meja.kategori')->find($reservasi->id_reservasi);
        return view('pages.details', [
            'nama'              => $pelanggan->nama_pengguna,
            'email'             => $pelanggan->email,
            'tipe_meja'         => $tipeMeja,
            'meja'              => $meja->nama_meja,
            'reservasiList'     => [$reservasi],
            'tanggal_reservasi' => $request->tanggal,
            'jam'               => $request->jam,
            'subtotal'          => $totalHarga,
            'total_akhir'       => $totalHarga,
            //'reservasi'         => $reservasi,
            'transaksi'         => TransaksiPembayaran::where('id_reservasi', $reservasi->id_reservasi)->first(),
        ]);
    }
            public function cekJadwal(Request $request)
            {
                $tanggal = $request->query('tanggal');
                $no_meja = $request->query('no_meja');

                $meja = Meja::where('nama_meja', $no_meja)->first();
                if (!$meja) {
                    return response()->json(['booked' => []]);
                }

                $booked = Reservasi::where('id_meja', $meja->id_meja)
                    ->where('tanggal_reservasi', $tanggal)
                    ->whereIn('status', ['menunggu_konfirmasi', 'dikonfirmasi'])
                    ->pluck('id_waktu')
                    ->toArray();

                return response()->json(['booked' => $booked]);
            }
            public function batalkan($id)
{
    $reservasi = \App\Models\Reservasi::find($id);

    if (!$reservasi) {
        return response()->json(['message' => 'Reservasi tidak ditemukan'], 404);
    }

    // Kalau belum ada bukti pembayaran, batalkan
    if (!$reservasi->transaksi?->bukti_pembayaran && $reservasi->status === 'menunggu_konfirmasi') {
        $reservasi->status = 'kadaluarsa';
        $reservasi->save();

        return response()->json(['message' => 'Reservasi kadaluarsa']);
    }

    return response()->json(['message' => 'Reservasi tidak dibatalkan']);
}
}