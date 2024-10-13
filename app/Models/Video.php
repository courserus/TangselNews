<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // Sesuaikan dengan field di tabel 'videos'
    protected $fillable = [
        'title',
        'creator',
        'link',
        'description',
    ];
}
