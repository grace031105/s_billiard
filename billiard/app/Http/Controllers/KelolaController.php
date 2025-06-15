<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelolaController extends Controller
{
    protected $meja;

    public function __construct(Meja $meja)
    {
        $this->meja = $meja;
    }

    public function show()
    {
        $mejas = $this->meja->all();
        return view('pages.kelola_meja', compact('mejas'));
    }

    public function simpan(Request $request)
    {
        $fileName = null;
        if ($request->hasFile('foto_meja')) {
            $file = $request->file('foto_meja');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
        }

        $meja = $this->meja->newInstance();
        $meja->kode_meja = $request->input('kode_meja');
        $meja->nama_meja = $request->input('nama_meja');
        $meja->tipe_meja = $request->input('tipe_meja');
        $meja->harga_per_jam = $request->input('harga_per_jam');
        $meja->foto_meja = $fileName;
        $meja->status_meja = $request->input('status_meja');

        $meja->id_pemilik = Auth::guard('pemilik')->user()->id_pemilik;

        $meja->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function delete($id)
    {
        $meja = $this->meja->find($id);
        if ($meja) {
            $meja->delete();
            return redirect()->back()->with('success', 'Meja berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Meja tidak ditemukan');
        }
    }

    public function edit($id_meja)
    {
        $mejas = $this->meja->all();
        $meja = $this->meja->findOrFail($id_meja);
        return view('pages.kelola_meja', compact('mejas', 'meja'));
    }

    public function update(Request $request, $id_meja)
    {
        $request->validate([
            'kode_meja' => 'required',
            'nama_meja' => 'required',
            'tipe_meja' => 'required',
            'harga_per_jam' => 'required|numeric',
        ]);

        $meja = $this->meja->findOrFail($id_meja);

        $meja->kode_meja = $request->kode_meja;
        $meja->nama_meja = $request->nama_meja;
        $meja->tipe_meja = $request->tipe_meja;
        $meja->harga_per_jam = $request->harga_per_jam;
        $meja->status_meja = $request->status_meja;

        if ($request->hasFile('foto_meja')) {
            $file = $request->file('foto_meja');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $meja->foto_meja = $fileName;
        }

        $meja->save();

        return redirect()->route('kelola_meja')->with('success', 'Data berhasil diupdate!');
    }
}