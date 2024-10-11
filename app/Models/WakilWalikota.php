<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WakilWalikota extends Model
{
    use HasFactory;

    protected $table = 'wakil_walikota'; // Sesuaikan nama tabel dengan database
    protected $fillable = ['judul', 'gambar', 'konten']; // Pastikan field sesuai
}
