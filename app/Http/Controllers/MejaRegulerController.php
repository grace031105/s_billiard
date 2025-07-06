<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja; 

class MejaRegulerController extends Controller
{
    public function index(Request $request)
    {
        $mejaList = Meja::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->where('nama_kategori', 'Reguler');})
        ->get(); // Ambil dari DB

        $mejaTerpilih = $request->query('meja'); 
    
    return view('pages.meja_reguler', compact('mejaList', 'mejaTerpilih'));

    }
    // app/Http/Controllers/MejaRegulerController.php

}
