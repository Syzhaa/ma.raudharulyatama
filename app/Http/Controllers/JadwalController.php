<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        return view('jadwal.index');
    }


    // public function show($id)
    // {
    //     // Logic to retrieve and display a specific schedule by ID
    //     return view('jadwal.show', compact('id'));
    // }
}
