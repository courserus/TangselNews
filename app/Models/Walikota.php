<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walikota extends Model
{
    use HasFactory;

    protected $table = 'walikota'; // Specify the table name if different from the model name

    protected $fillable = [
        'judul',
        'gambar',
        'konten',
    ];
}
