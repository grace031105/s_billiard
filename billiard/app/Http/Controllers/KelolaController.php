<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class KelolaController extends Controller
{
    public function show()
    {
        $mejas = Meja::all(); // Ambil semua data dari tabel 'meja'
        return view('pages.kelola_meja', compact('mejas')); // Kirim satu variabel array
    }
    public function simpan(Request $request)
    {   $fileName = null;
        if ($request->hasFile('foto_meja')) {
            $file = $request->file('foto_meja');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
        }

        $meja = new Meja;
        $meja->nama_meja = $request->input('nama_meja');
        $meja->tipe_meja = $request->input('tipe_meja');
        $meja->harga_per_jam = $request->input('harga_per_jam');
        $meja->foto_meja = $fileName;
        $meja->status_meja = (int) $request->input('status_meja');
        $meja->save();
        
        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
