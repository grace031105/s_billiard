<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Meja; 
use App\Models\WaktuSewa;

class MejaController extends Controller
{
    public function cari(Request $request)
{
    $keyword = $request->query('query');

    if (!$keyword) {
        return redirect()->back()->with('error', 'Kata kunci pencarian tidak boleh kosong.');
    }

$hasil = Meja::with('kategori')
    ->where(function ($query) use ($keyword) {
        $query->where('nama_meja', 'like', "%$keyword%")
              ->orWhereHas('kategori', function ($q) use ($keyword) {
                  $q->whereRaw('LOWER(nama_kategori) = ?', [strtolower($keyword)]);
              });
    })
    ->get();


        $waktuList = WaktuSewa::all();

        

    return view('pages.cari_meja', compact('hasil', 'keyword', 'waktuList'));
}

public function reguler($id, Request $request)
{
    $mejaList = Meja::whereHas('kategori', function($query) {
        $query->where('nama_kategori', 'reguler');
    })->get();

    $mejaTerpilihId = $id;
    $mejaTerpilih = Meja::find($id)?->nama_meja;

    $waktuList = WaktuSewa::all();

    return view('pages.meja_reguler', compact(
        'mejaList', 'mejaTerpilihId', 'mejaTerpilih', 'waktuList'
    ));
}

public function vip($id, Request $request)
{
    $mejaList = Meja::whereHas('kategori', function($query) {
        $query->where('nama_kategori', 'vip');
    })->get();

    $mejaTerpilihId = $id;
    $mejaTerpilih = Meja::find($id)?->nama_meja;

    $waktuList = WaktuSewa::all();

    return view('pages.meja_vip', compact(
        'mejaList', 'mejaTerpilihId', 'mejaTerpilih', 'waktuList'
    ));
}

public function platinum($id, Request $request)
{
    $mejaList = Meja::whereHas('kategori', function($query) {
        $query->where('nama_kategori', 'platinum');
    })->get();

    $mejaTerpilihId = $id;
    $mejaTerpilih = Meja::find($id)?->nama_meja;

    $waktuList = WaktuSewa::all();

    return view('pages.meja_platinum', compact(
        'mejaList', 'mejaTerpilihId', 'mejaTerpilih', 'waktuList'
    ));
}


}
