<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontenProfilController extends Controller
{
    public function kontak()
    {
        return view('kontak');
    }
    public function lambang_daerah()
    {
        return view('lambang_daerah');
    }

    public function visi_misi()
    {
        return view('visi_misi');
    }

    public function profil_walikota()
    {
        return view('profil_walikota');
    }

    public function profil_wakil_walikota()
    {
        return view('profil_wakil_walikota');
    }


    public function sejarah_tangsel()
    {
        return view('sejarah_tangsel');
    }


    public function struktur_pemerintahan()
    {
        return view('struktur_pemerintahan');
    }

    public function  gambaran_umum()
    {
        return view('gambaran_umum');
    }

    public function tangsel_dalam_angka()
    {
        return view('tangsel_dalam_angka');
    }

    public function geografi()
    {
        return view('geografi');
    }

    public function sarana_dan_prasarana()
    {
        return view('sarana_dan_prasarana');
    }
}
