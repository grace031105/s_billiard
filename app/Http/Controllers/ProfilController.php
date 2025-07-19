<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pelanggan;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::guard('pelanggan')->user();

        return view('pages.profil', compact('user'));
    }

    public function edit()
    {
        $user = Auth::guard('pelanggan')->user();

        return view('pages.edit_profil', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_pengguna'   => 'required|string|max:255',
            'email'           => 'required|email',
            'nomor_hp'      => 'required|string|max:20',
            'kata_sandi_baru' => 'nullable|string|min:6',
        ]);

        $user = Auth::guard('pelanggan')->user();

        $user->nama_pengguna = $request->nama_pengguna;
        $user->email = $request->email;
        $user->nomor_hp = $request->nomor_hp;

        if ($request->filled('kata_sandi_baru')) {
            $user->password = Hash::make($request->kata_sandi_baru);
        }

        $user->save();

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
