<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sejarah extends Model
{
    use HasFactory;

 wildan

    protected $table = 'sejarahs'; // Pastikan nama tabel sesuai
 master

    protected $fillable = [
        'konten',
    ];
}
