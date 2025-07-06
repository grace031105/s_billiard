<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;

class MejaPlatinumController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua meja yang kategori-nya Platinum
        $mejaList = Meja::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->where('nama_kategori', 'Platinum');
            })
            ->get();

        // Ambil meja yang dipilih dari parameter URL (?meja=...)
        $mejaTerpilih = $request->query('meja');

        return view('pages.meja_platinum', compact('mejaList', 'mejaTerpilih'));
    }
}
