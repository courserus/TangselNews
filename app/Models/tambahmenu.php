<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'tambah_menu'; // Nama tabel yang digunakan
    // Tentukan field yang dapat diisi
    protected $fillable = [
        'nama_menu',
        'link_menu',
        'ikon',
    ];
}
