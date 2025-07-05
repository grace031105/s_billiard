<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Meja; 

class MejaController extends Controller
{
    public function cari(Request $request)
{
    $keyword = $request->query('query');

    if (!$keyword) {
        return redirect()->back()->with('error', 'Kata kunci pencarian tidak boleh kosong.');
    }

    $hasil = Meja::where('nama_meja', 'like', "%$keyword%")
        ->orWhere('tipe_meja', 'like', "%$keyword%")
        ->get();

    return view('pages.cari_meja', compact('hasil', 'keyword'));
}

public function reguler($id) {
    $meja = Meja::findOrFail($id);
    return view('meja_reguler', compact('meja'));
}

public function vip($id) {
    $meja = Meja::findOrFail($id);
    return view('meja_vip', compact('meja'));
}

public function platinum($id) {
    $meja = Meja::findOrFail($id);
    return view('meja_platinum', compact('meja'));
}


}
