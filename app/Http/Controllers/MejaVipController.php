<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja; // ✅ Ini yang benar

class MejaVipController extends Controller
{
    public function index(Request $request)
    {
        $mejaList = Meja::where('tipe_meja', 'Reguler')->get();
    $mejaTerpilih = $request->query('meja'); // ✅ Tangkap dari URL

    return view('pages.meja_vip', compact('mejaList', 'mejaTerpilih'));
    }


}
