<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja; // ✅ Ini yang benar

class MejaPlatinumController extends Controller
{
    public function index(Request $request)
    {
        $mejaList = Meja::where('tipe_meja', 'Reguler')->get();
    $mejaTerpilih = $request->query('meja'); // ✅ Tangkap dari URL

    return view('pages.meja_platinum', compact('mejaList', 'mejaTerpilih'));

}
}
