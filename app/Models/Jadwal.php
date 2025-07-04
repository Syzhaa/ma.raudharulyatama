<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sama dengan plural dari nama model)
    protected $table = 'jadwals';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'gambar',
        'tanggal',
        'kelas',
    ];
}
