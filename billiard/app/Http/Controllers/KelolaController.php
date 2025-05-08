<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaController extends Controller
{
    public function index()
    {
        $mejas = [
            ['id' => '001', 'tipe' => 'VIP', 'nama' => 'Meja A1', 'harga' => 'Rp150.000', 'status' => 'Tersedia'],
            ['id' => '002', 'tipe' => 'Reguler', 'nama' => 'Meja B1', 'harga' => 'Rp100.000', 'status' => 'Tersedia'],
        ];

        return view('pages.kelola_meja', compact('mejas'));
    }
}
?>