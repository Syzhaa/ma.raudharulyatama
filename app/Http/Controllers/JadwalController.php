<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;


use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::latest()->get();
        return view('jadwal.index', compact('jadwals'));
    }


    // public function show($id)
    // {
    //     // Logic to retrieve and display a specific schedule by ID
    //     return view('jadwal.show', compact('id'));
    // }
}
