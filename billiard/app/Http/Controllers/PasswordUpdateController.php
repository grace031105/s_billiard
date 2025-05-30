<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordUpdateController extends Controller
{
    public function edit()
    {
        return view('auth.password-update');
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Kata sandi berhasil diperbarui.');
    }
}
