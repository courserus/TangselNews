<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $table = 'wisatas'; // Sesuaikan jika nama tabel berbeda

    protected $fillable = [
        'nama_wisata',
        'lokasi',
        'deskripsi',
        'kategori',
        'gambar',
    ];
}
