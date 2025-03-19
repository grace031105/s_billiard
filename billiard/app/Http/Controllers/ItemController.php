<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // Data contoh (seharusnya ini dari database)
        $items = [
            (object) ['id' => 1, 'name' => 'Meja Billiard', 'price' => 12000000],
            (object) ['id' => 2, 'name' => 'Stick', 'price' => 250000],
            (object) ['id' => 3, 'name' => 'Bola Billiard', 'price' => 150000]
        ];

        return view('items', compact('items'));
    }
}