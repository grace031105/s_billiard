<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Tampilkan halaman login
    public function showLoginForm()
    {
        return view('pages.login');
    }

    // Proses login
     public function login(Request $request)
    {
        return redirect()->route('dash');
    }
}
