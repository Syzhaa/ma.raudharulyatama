<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Logo;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $logo = Logo::first();
        return view('admin.profile', compact('logo'));
    }

    /**
     * Memperbarui data profil admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diupdate');
    }

    /**
     * Memperbarui logo aplikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logo = Logo::first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/img/logo');

            // Buat folder jika belum ada
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            // Pindahkan file
            $file->move($destination, $filename);

            // Jika logo lama ada, hapus
            if ($logo && $logo->file_name && File::exists($destination . '/' . $logo->file_name)) {
                File::delete($destination . '/' . $logo->file_name);
            }

            if ($logo) {
                $logo->file_name = $filename;
                $logo->save();
            } else {
                Logo::create(['file_name' => $filename]);
            }
        }

        return redirect()->route('admin.profile.index')->with('success', 'Logo berhasil diupdate');
    }
}
