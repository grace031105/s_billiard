<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Reservasi;
use App\Models\Meja;
use App\Models\WaktuSewa;
use App\Models\TransaksiPembayaran;

class ReservasiController extends Controller
{
    // Fungsi menyimpan reservasi dari pelanggan
    public function store(Request $request)
    {
        $request->validate([
            'no_meja'       => 'required|string',
            'tanggal'       => 'required|date',
            'jam'           => 'required|string',
            'jumlah_orang'  => 'required|integer|min:1',
            'subtotal'      => 'required|integer|min:0',
        ]);

        $id_pelanggan = Auth::guard('pelanggan')->id();

        // Cari meja berdasarkan nama_meja
        $meja = Meja::where('nama_meja', $request->no_meja)->first();
        if (!$meja) {
            return back()->withErrors(['Meja tidak ditemukan.']);
        }

        // Cek apakah meja sudah dipesan di jam yang sama
        $reservasiExist = Reservasi::where('id_meja', $meja->id_meja)
            ->where('tanggal_reservasi', $request->tanggal)
            ->where('jam', $request->jam)
            ->whereNotIn('status', ['dibatalkan'])
            ->exists();

        if ($reservasiExist) {
            return back()->withErrors(['Meja ini sudah dipesan pada jam tersebut.']);
        }

        // Ambil id_waktu dari jam pertama
        $jam_array = preg_split('/,\s*/', $request->jam);
        $rentang = explode('-', trim($jam_array[0]));
        $jam_mulai = date('H:i:s', strtotime(trim($rentang[0])));
        $jam_selesai = date('H:i:s', strtotime(trim($rentang[1])));

        $waktu = WaktuSewa::where('jam_mulai', $jam_mulai)
                    ->where('jam_selesai', $jam_selesai)
                    ->first();

        // Simpan data reservasi
        Reservasi::create([
            //'id_pelanggan'      => $id_pelanggan,
            'id_pelanggan' => Auth::guard('pelanggan')->id(),
            'id_meja'           => $meja->id_meja,
            'id_pemilik'        => $meja->id_pemilik ?? 1,
            'tanggal_reservasi' => $request->tanggal,
           // 'jam'               => $request->jam,
            'id_waktu'          => $waktu ? $waktu->id_waktu : null,
            'durasi_sewa'       => count($jam_array),
            'total_harga'       => $request->subtotal,
            'status'            => 'menunggu_konfirmasi',
            'kode_reservasi'    => Str::upper(Str::random(8)),
        ]);

        return redirect()->route('pelanggan.riwayat')->with('success', 'Reservasi berhasil dibuat.');
    }

    public function form()
    {
        $waktuList = WaktuSewa::all(); // Ambil semua waktu
        $reservasiList = Reservasi::select('id_meja', 'tanggal_reservasi', 'id_waktu')
            ->whereIn('status', ['menunggu_konfirmasi', 'dikonfirmasi'])
            ->get();

        return view('pages.reservasi', compact('waktuList', 'reservasiList'));
    }

    // Fungsi menampilkan reservasi untuk pemilik
    public function show()
    {
        $id_pemilik = Auth::guard('pemilik')->id();

        Reservasi::where('status', 'menunggu_konfirmasi')
            ->where('is_seen', false)
            ->update(['is_seen' => true]);

        $reservasih = Reservasi::with(['pelanggan', 'meja.kategori', 'waktu', 'transaksi'])
                    ->where('id_pemilik', $id_pemilik)
                    ->paginate(5);


        //$reservasih = Reservasi::with(['pelanggan', 'meja', 'waktu', 'transaksi'])
                       // ->where('id_pemilik', $id_pemilik)
                       // ->get();

        return view('pages.reservasi', [
            'reservasih' => $reservasih,
            'notifikasiReservasi' => $reservasih
        ]);
    }

    // Konfirmasi reservasi oleh pemilik
    public function konfirmasi($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = 'dikonfirmasi';
        $reservasi->save();

        return redirect()->back()->with('success', 'Reservasi berhasil dikonfirmasi.');
    }

    // Batalkan reservasi oleh pemilik
    public function batal($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $reservasi->status = 'dibatalkan';
        $reservasi->save();

        return redirect()->back()->with('success', 'Reservasi berhasil dibatalkan.');
    }

    // Tambahkan ini di bagian paling bawah, tapi masih di dalam class
    public function showDetails()
    {
        $id_pelanggan = Auth::guard('pelanggan')->id();

        $reservasiList  = Reservasi::with(['meja.kategori', 'waktu', 'transaksi', 'pelanggan'])
                        ->where('id_pelanggan', $id_pelanggan)
                        ->where('status', 'menunggu_konfirmasi')
                        ->orderBy('id_reservasi', 'desc')
                        ->get();

        //$reservasi = $reservasiList->first();
        if ($reservasiList->isEmpty()) {
            abort(404, 'Reservasi tidak ditemukan');
        }

        return view('pages.details', [
            'reservasiList' => $reservasiList
        ]);

        $transaksi = TransaksiPembayaran::where('id_reservasi', $reservasi->id_reservasi)->first();
        return view('pages.details', [
            'nama'           => $reservasi->pelanggan->nama_pengguna ?? '',
            'email'          => $reservasi->pelanggan->email ?? '',
            'tipe_meja'      => $reservasi->meja->kategori->nama_kategori ?? '-', 
            'meja'           => $reservasi->no_meja,
            'tanggal_reservasi' => $reservasi->tanggal_reservasi,
            'jam'            => $reservasi->jam,
            'jumlah_orang'   => $reservasi->jumlah_orang,
            'subtotal'       => $reservasi->total_harga,
            'total_biaya'    => $reservasi->total_harga,
            'reservasi'      => $reservasi,
            'transaksi'      => $transaksi,
        ]);
        
    }
        public function cekJamTerpakai(Request $request)
        {
            $tanggal = $request->tanggal;
            $no_meja = $request->no_meja;

            $meja = Meja::where('nama_meja', $no_meja)->first();
            if (!$meja) {
                return response()->json([]);
            }

            $idMeja = $meja->id_meja;

            $jamTerpakai = Reservasi::where('id_meja', $idMeja)
                ->where('tanggal_reservasi', $tanggal)
                ->whereNotIn('status', ['selesai', 'dibatalkan'])
                ->pluck('id_waktu')
                ->toArray();

            return response()->json($jamTerpakai);
     }
}
