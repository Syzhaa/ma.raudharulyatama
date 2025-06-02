<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Agenda;
use App\Models\Artikel;
use App\Models\Pengumuman;
use App\Models\Jadwal;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home.index',[
            'agenda' => Agenda::latest()->take(2)->get(),
            'artikel' => Artikel::with(['user', 'kategoriArtikel'])->latest()->take(3)->get(),
            'pengumuman' => Pengumuman::with(['user'])->latest()->take(3)->get(),
            'jadwal' => Jadwal::latest()->take(3)->get(),
        ]);
    }

    public function about()
    {
    	return view('home.about');
    }

    public function contact()
    {
    	return view('home.contact');
    }
}
