<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja; // ✅ Ini yang benar

class MejaRegulerController extends Controller
{
    public function index()
    {
        $mejaList = Meja::where('tipe_meja', 'rEGULER')->get(); // Ambil dari DB

        return view('pages.meja_reguler', compact('mejaList'));
    }
}
