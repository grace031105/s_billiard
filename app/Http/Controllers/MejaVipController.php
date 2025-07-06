<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;

class MejaVipController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua meja dengan kategori VIP
        $mejaList = Meja::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->where('nama_kategori', 'VIP');
            })
            ->get();

        // Ambil meja yang dipilih dari URL (misal ?meja=1)
        $mejaTerpilih = $request->query('meja');

        return view('pages.meja_vip', compact('mejaList', 'mejaTerpilih'));
    }
}
