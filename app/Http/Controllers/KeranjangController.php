<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    // ✅ Tambahkan item ke session keranjang
    public function tambah(Request $request)
    {
        $keranjang = session()->get('keranjang', []);

        $keranjang[] = [
            'tipe_meja'     => $request->tipe_meja,
            'tanggal'       => $request->tanggal,
            'jam'           => $request->jam,
            'no_meja'       => $request->no_meja,
            'jumlah_orang'  => $request->jumlah_orang ?? 1,
            'subtotal'      => $request->subtotal,
        ];

        session(['keranjang' => $keranjang]);

        return response()->json(['success' => true]);
    }

    // ✅ Hapus item keranjang berdasarkan index yang dikirim dari fetch
    public function hapus(Request $request)
    {
        $index = $request->input('index');
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$index])) {
            unset($keranjang[$index]);
            session(['keranjang' => array_values($keranjang)]); // Reset index agar berurutan
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    // (Opsional) ✅ Menampilkan halaman keranjang jika kamu punya halaman khusus
    public function index()
    {
        $keranjang = session('keranjang', []);
        return view('keranjang.index', compact('keranjang'));
    }
}
