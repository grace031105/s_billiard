<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function index()
    {

        return view('edit_profil', compact('edit_profil'));
    }
}