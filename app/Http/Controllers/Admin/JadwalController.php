<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            $jadwal = Jadwal::orderByRaw("FIELD(kelas, '10', '11', '12')")->get();
            return view('admin.jadwal.index', compact('jadwal'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
            'kelas' => 'required|in:10,11,12',
        ]);

        $gambar = $request->file('gambar');
        $namaFile = time() . '_' . $gambar->getClientOriginalName();

        // Tentukan folder tujuan
        $tujuanUpload = public_path('uploads/img/jadwal');

        // Cek dan buat folder jika belum ada
        if (!file_exists($tujuanUpload)) {
            mkdir($tujuanUpload, 0755, true); // recursive=true
        }

        // Pindahkan file ke folder
        $gambar->move($tujuanUpload, $namaFile);

        // Simpan path ke database
        \App\Models\Jadwal::create([
            'gambar' => 'uploads/img/jadwal/' . $namaFile,
            'tanggal' => $request->tanggal,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('admin.jadwal.create')->with('success', 'Jadwal berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kelas' => 'required|in:10,11,12',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $jadwal = Jadwal::findOrFail($id);

        // Jika ada gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($jadwal->gambar && file_exists(public_path($jadwal->gambar))) {
                unlink(public_path($jadwal->gambar));
            }

            $gambar = $request->file('gambar');
            $nama_file = time() . '_' . $gambar->getClientOriginalName();
            $tujuan = public_path('upload/img/jadwal');

            // Buat folder jika belum ada
            if (!file_exists($tujuan)) {
                mkdir($tujuan, 0755, true);
            }

            // Pindahkan file
            $gambar->move($tujuan, $nama_file);

            // Simpan path gambar ke database
            $jadwal->gambar = 'upload/img/jadwal/' . $nama_file;
        }

        // Update data lainnya
        $jadwal->tanggal = $request->tanggal;
        $jadwal->kelas = $request->kelas;
        $jadwal->save();

        return redirect()->route('admin.jadwal.index')->with('success', 'Data jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
