<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function prosesReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = DB::table('user')->where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        DB::table('user')
            ->where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        return redirect('/login')->with('success', 'Kata sandi berhasil direset.');
    }
}
