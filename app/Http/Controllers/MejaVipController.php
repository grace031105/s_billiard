<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja; // ✅ Ini yang benar

class MejaVipController extends Controller
{
    public function index()
    {
        $mejaList = Meja::where('tipe_meja', 'VIP')->get(); // Ambil dari DB

        return view('pages.meja_vip', compact('mejaList'));
    }
}
