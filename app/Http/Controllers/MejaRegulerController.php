<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja; // ✅ Ini yang benar

class MejaRegulerController extends Controller
{
    public function index(Request $request)
    {
        $mejaList = Meja::where('tipe_meja', 'rEGULER')->get(); // Ambil dari DB
        $mejaTerpilih = $request->query('meja'); // ✅ Tangkap dari URL
    
    return view('pages.meja_reguler', compact('mejaList', 'mejaTerpilih'));

    }
    // app/Http/Controllers/MejaRegulerController.php

}
