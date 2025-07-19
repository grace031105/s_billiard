<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Reservasi;
use App\Models\Meja;
use App\Models\WaktuSewa;
use App\Models\TransaksiPembayaran;
use Carbon\Carbon;


class ReservasiController extends Controller
{
    
    // Fungsi menampilkan reservasi untuk pemilik
    public function show(Request $request)
    {
        $id_pemilik = Auth::guard('pemilik')->id();

        Reservasi::where('status', 'menunggu_konfirmasi')
            ->where('is_seen', false)
            ->update(['is_seen' => true]);

        $reservasih = Reservasi::with(['pelanggan', 'meja.kategori', 'waktu', 'transaksi'])
                    ->where('id_pemilik', $id_pemilik);
                    
        if ($request->filter == 'today') {
            $reservasih->whereDate('tanggal_reservasi', Carbon::today());
        } elseif ($request->filter == 'week') {
            $reservasih->whereBetween('tanggal_reservasi', [Carbon::today(), Carbon::today()->addDays(7)]);
        } elseif ($request->filter == 'month') {
            $reservasih->whereMonth('tanggal_reservasi', Carbon::now()->month);
        }

        $reservasih = $reservasih->paginate(5);

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

        $reservasi = $reservasiList->first();
        if ($reservasiList->isEmpty()) {
            abort(404, 'Reservasi tidak ditemukan');
        }
        $transaksi = $reservasi?->transaksi;
        return view('pages.details', [
            'reservasiList' => $reservasiList,
            'nama'           => $reservasi->pelanggan->nama_pengguna ?? '',
            'email'          => $reservasi->pelanggan->email ?? '',
            'tipe_meja'      => $reservasi->meja->kategori->nama_kategori ?? '-', 
            'meja'           => $reservasi->no_meja,
            'tanggal_reservasi' => $reservasi->tanggal_reservasi,
            'jam'            => $reservasi->jam,
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
