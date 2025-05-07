<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detailpenyewaanController extends Controller
{
    public function index()
    {

        return view('detail_penyewaan', compact('detail_penyewaan'));
    }
}
