<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('pages.edit_profil', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'no_telepon' => 'required|string|max:20',
            'kata_sandi_baru' => 'nullable|string|min:6',
        ]);

        $user = Auth::user();
        $user->email = $request->email;
        $user->no_telepon = $request->no_telepon;

        if ($request->filled('kata_sandi_baru')) {
            $user->password = Hash::make($request->kata_sandi_baru);
        }

        $user->save();

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
