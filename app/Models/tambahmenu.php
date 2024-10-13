<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahmenu extends Model
{
    use HasFactory;

    protected $table = 'tambahmenu'; // Nama tabel di database

    protected $fillable = [
        'nama_menu',
        'url_menu',
        'icon_menu',
        'is_active',
    ];

    public $timestamps = true; // Mengaktifkan created_at dan updated_at
}
