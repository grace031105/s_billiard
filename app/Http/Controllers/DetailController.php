<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function store(Request $request)
    {
        //  Ambil user login
        $pelanggan = Auth::guard('pelanggan')->user();

        //  Simpan ke database hanya pakai kolom yang ada
        $reservasi = new Reservasi();
        $reservasi->id_pelanggan = $pelanggan->id_pelanggan;
        $reservasi->id_meja = $request->id_meja; // Pastikan dari form kirim ID meja
        $reservasi->tanggal_reservasi = $request->tanggal_reservasi;
        $reservasi->id_waktu = $request->id_waktu;
        $reservasi->subtotal = $request->subtotal;
        $reservasi->total_akhir = $request->total_akhir;
        $reservasi->status = 'menunggu_konfirmasi';
        $reservasi->save();

        //  Redirect ke detail view, sambil kirim data untuk tampilan
        return view('pages.details', [
            'nama' => $pelanggan->nama_pengguna,
            'email' => $pelanggan->email,
            'meja' => $reservasi->meja, // Pastikan relasi di model Reservasi
            'tanggal_reservasi' => $reservasi->tanggal,
            'jam' => $reservasi->jam,
            'subtotal' => $reservasi->subtotal,
            'total_akhir' => $reservasi->total_akhir,
        ]);
        return redirect()->route('details.show', $reservasi->id_reservasi);

    }
}
?>