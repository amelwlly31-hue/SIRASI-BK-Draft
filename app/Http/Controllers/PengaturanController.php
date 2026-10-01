<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()         // Menampilkan halaman pengaturan
    {
        $user = Auth::user();

        return view('pengaturan.index', compact('user'));
    }

    public function updateProfile(Request $request)         // Mengubah profil pengguna
    {
        $user = Auth::user();

        $validated = $request->validate([
            'nama' => 'required|string|max:100',

            'username' => [
                'required',
                'string',
                'max:100',
                'unique:users,username,' . $user->id_user . ',id_user',
            ],

            'foto_profil' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);

        $data = [
            'nama' => $validated['nama'],
            'username' => $validated['username'],
        ];

        if ($request->hasFile('foto_profil')) {
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            $data['foto_profil'] = $request
                ->file('foto_profil')
                ->store('profile', 'public');
        }

        User::where('id_user', $user->id_user)
            ->update($data);

        return redirect()
            ->route('pengaturan.index')
            ->with(
                'success',
                'Profil berhasil diperbarui.'
            );
    }

    public function updatePassword(Request $request)        // Mengubah password pengguna
    {
        $validated = $request->validate([
            'password_lama' => 'required|string',

            'password_baru' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $user = Auth::user();

        if (!Hash::check(           // Cek password lama
            $validated['password_lama'],
            $user->password
        )) {
            return back()
                ->withErrors([
                    'password_lama' =>
                        'Password lama tidak sesuai.'
                ])
                ->withInput();
        }

        User::where('id_user', $user->id_user)          // Update password langsung melalui query
            ->update([
                'password' => Hash::make(
                    $validated['password_baru']
                ),
            ]);

        return redirect()
            ->route('pengaturan.index')
            ->with(
                'success',
                'Password berhasil diperbarui.'
            );
    }
}
