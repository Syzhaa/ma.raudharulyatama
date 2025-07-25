<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::first(); // Ambil data pertama (asumsi hanya satu record)
        return view('tentang.index', compact('tentang'));
    }
}
