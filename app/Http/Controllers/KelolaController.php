<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\Kategori;
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
        $mejas = $this->meja->with('kategori')->get();
        $kategoriList = Kategori::all();
        return view('pages.kelola_meja', compact('mejas', 'kategoriList'));
    }

    public function simpan(Request $request)
    {
        $fileName = null;
        if ($request->hasFile('foto_meja')) {
            $file = $request->file('foto_meja');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
        }

        $request->validate([
            'nama_meja' => 'required',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'harga_per_jam' => 'nullable|numeric',
        ]);

        $harga = $request->input('harga_per_jam');
        if (is_null($harga)) {
            $kategori = Kategori::find($request->input('id_kategori'));
            $harga = $kategori ? $kategori->harga_default : 0;
        }

        $meja = $this->meja->newInstance();
        $meja->kode_meja = $request->input('kode_meja');
        $meja->nama_meja = $request->input('nama_meja');
        $meja->id_kategori = $request->input('id_kategori');
        $meja->harga_per_jam = $harga;
        $meja->foto_meja = $fileName;
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
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'harga_per_jam' => 'nullable|numeric',
        ]);

        $harga = $request->input('harga_per_jam');
        if (is_null($harga)) {
            $kategori = Kategori::find($request->input('id_kategori'));
            $harga = $kategori ? $kategori->harga_default : 0;
        }

        $meja = $this->meja->findOrFail($id_meja);

        $meja->kode_meja = $request->kode_meja;
        $meja->nama_meja = $request->nama_meja;
        $meja->id_kategori = $request->id_kategori;
        $meja->harga_per_jam = $harga;
        //$meja->status_meja = $request->status_meja;

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