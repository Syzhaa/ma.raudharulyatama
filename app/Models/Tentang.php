<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{

    protected $table = 'tentang';

    protected $fillable = [
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
}
