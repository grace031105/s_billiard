<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPenyewaan;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatPenyewaan::latest()->get();
        return view('pages.riwayat_penyewaan', compact('riwayat'));
    }

    public function destroy($id)
    {
        $item = RiwayatPenyewaan::findOrFail($id);
        $item->delete();

        return redirect()->route('riwayat.index')->with('success', 'Data berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $item = RiwayatPenyewaan::findOrFail($id);
        $item->aksi = $request->aksi;
        $item->save();

        return redirect()->back()->with('success', 'Aksi berhasil diperbarui.');
    }

    public function show($id)
    {
        $riwayat = RiwayatPenyewaan::findOrFail($id);
        return view('pages.detail_riwayat', compact('riwayat'));
    }
}
