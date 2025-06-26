<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja; // ✅ Ini yang benar

class MejaPlatinumController extends Controller
{
    public function index()
    {
        $mejaList = Meja::where('tipe_meja', 'Platinum')->get(); // Ambil dari DB

        return view('pages.meja_platinum', compact('mejaList'));
    }
}
