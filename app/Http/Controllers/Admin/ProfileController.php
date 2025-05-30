<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Logo; // pastikan model logo ada dan benar

class ProfileController extends Controller
{
    public function index()
    {
        $logo = Logo::first();
        return view('admin.profile', compact('logo'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diupdate');
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logo = Logo::first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/img/logo'), $filename);

            if ($logo) {
                // hapus logo lama jika perlu
                if ($logo->file_name && file_exists(public_path('uploads/img/logo/' . $logo->file_name))) {
                    unlink(public_path('uploads/img/logo/' . $logo->file_name));
                }
                $logo->file_name = $filename;
                $logo->save();
            } else {
                Logo::create(['file_name' => $filename]);
            }
        }

        return redirect()->route('admin.profile.index')->with('success', 'Logo berhasil diupdate');
    }
}
