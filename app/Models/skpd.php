<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari konvensi default
    protected $table = 'skpd';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_skpd',
        'inisial',
        'titik_latitude',
        'titik_longitude',
        'no_telp',
        'alamat',
        'isi_bagian'
    ];
}
