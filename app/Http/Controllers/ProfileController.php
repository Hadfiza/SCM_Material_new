<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan profil pengguna.
     */
    public function show()
    {
        $user = auth()->user();

        // Cek apakah pengguna adalah admin atau user dan arahkan sesuai tipe
        if ($user->usertype === 'admin') {
            // Pastikan hanya mengarahkan admin jika mereka belum berada di halaman admin
            if (request()->routeIs('admin.profile.show')) {
                return view('admin.profile.show', ['user' => $user]);
            }
            return redirect()->route('admin.profile.show');
        }

        return view('profile.show', [
            'user' => $user,
        ]);
    }

    /**
     * Menampilkan halaman edit profil.
     */
    public function edit()
    {
        $user = auth()->user();

        // Cek apakah pengguna adalah admin atau user dan arahkan sesuai tipe
        if ($user->usertype === 'admin') {
            // Pastikan hanya mengarahkan admin jika mereka belum berada di halaman edit admin
            if (request()->routeIs('admin.profile.edit')) {
                return view('admin.profile.edit', ['user' => $user]);
            }
            return redirect()->route('admin.profile.edit');
        }

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Memperbarui profil pengguna.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validasi input termasuk foto
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048', // Maksimal 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update data pengguna
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Jika ada file foto diunggah
        if ($request->hasFile('photo')) {
            // Simpan file baru di storage
            $photoPath = $request->file('photo')->store('profile_photos', 'public');

            // Hapus foto lama jika ada
            if (!empty($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            // Simpan path foto baru
            $user->photo = $photoPath;
        }

        // Simpan perubahan ke database
        $user->save();

        // Redirect berdasarkan tipe pengguna
        if ($user->usertype === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Profil berhasil diperbarui.');
        }

        return redirect()->route('dashboard')->with('success', 'Profil berhasil diperbarui.');
    }
}
