<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $table = 'kuliners'; // Sesuaikan jika nama tabel berbeda

    protected $fillable = [
        'nama_kuliner',
        'deskripsi',
        'kategori',
        'gambar',
    ];
}
