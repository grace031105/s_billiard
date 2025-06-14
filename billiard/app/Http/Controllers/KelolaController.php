<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelolaController extends Controller
{
    // Tampilkan seluruh data meja
    public function show()
    {
        $mejas = Meja::all();
        return view('pages.kelola_meja', compact('mejas'));
    }

    // Simpan data meja baru
    public function simpan(Request $request)
    {
        $fileName = null;

        if ($request->hasFile('foto_meja')) {
            $file = $request->file('foto_meja');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
        }

        $meja = new Meja;
        $meja->kode_meja     = $request->input('kode_meja');
        $meja->nama_meja     = $request->input('nama_meja');
        $meja->tipe_meja     = $request->input('tipe_meja');
        $meja->harga_per_jam = $request->input('harga_per_jam');
        $meja->foto_meja     = $fileName;
        $meja->status_meja   = $request->input('status_meja');
        $meja->id_pemilik    = Auth::guard('pemilik')->user()->id_pemilik;

        $meja->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    // Hapus data meja berdasarkan ID
    public function delete($id)
    {
        $meja = Meja::where('id_meja', $id)->first();

        if ($meja) {
            $meja->delete();
            return redirect()->back()->with('success', 'Meja berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Meja tidak ditemukan');
        }
    }

    // Tampilkan form edit dengan data meja tertentu
    public function edit($id_meja)
    {
        $mejas = Meja::all();
        $meja  = Meja::findOrFail($id_meja);

        return view('pages.kelola_meja', compact('mejas', 'meja'));
    }

    // Proses update data meja
    public function update(Request $request, $id_meja)
    {
        $request->validate([
            'nama_meja'     => 'required',
            'tipe_meja'     => 'required',
            'harga_per_jam' => 'required|numeric',
        ]);

        $meja = Meja::findOrFail($id_meja);

        // Cek apakah ada upload foto baru
        if ($request->hasFile('foto_meja')) {
            $file = $request->file('foto_meja');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $meja->foto_meja = $fileName;
        }

        // Update data lainnya
        $meja->nama_meja     = $request->input('nama_meja');
        $meja->tipe_meja     = $request->input('tipe_meja');
        $meja->harga_per_jam = $request->input('harga_per_jam');
        $meja->status_meja   = $request->input('status_meja');

        $meja->save();

        return redirect()->route('kelola_meja')->with('success', 'Data berhasil diupdate!');
    }
}
