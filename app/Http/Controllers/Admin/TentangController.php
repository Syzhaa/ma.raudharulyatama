<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
// use Purifier;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::all();
        return view('admin.tentang.index', compact('tentang'));
    }

    public function edit($id)
    {
        $tentang = Tentang::findOrFail($id);
        return view('admin.tentang.edit', compact('tentang'));
    }

    public function update(Request $request, $id)
    {
        $tentang = Tentang::findOrFail($id);

        $fields = [
            'profil_ma_raudhatul_yatama',
            'visi',
            'misi',
            'tujuan_pendidikan',
            'staf_pengajar',
            'kegiatan_keislaman',
            'fasilitas_penunjang',
            'lokasi_judul',
            'lokasi_iframe_gmaps',
            'kontak',
        ];

        $validatedData = $request->validate([
            'profil_ma_raudhatul_yatama' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tujuan_pendidikan' => 'nullable|string',
            'staf_pengajar' => 'nullable|string',
            'kegiatan_keislaman' => 'nullable|string',
            'fasilitas_penunjang' => 'nullable|string',
            'lokasi_judul' => 'nullable|string',
            'lokasi_iframe_gmaps' => 'nullable|string',
            'kontak' => 'nullable|string',
        ]);

        foreach ($fields as $field) {
            $tentang->$field = Purifier::clean($validatedData[$field] ?? '');
        }

        $tentang->save();

        return redirect()->route('admin.tentang.index', $tentang->id)->with('success', 'Data Tentang berhasil diperbarui.');
    }
}
