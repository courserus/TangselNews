<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiPublikController extends Controller
{
    public function SKPD()
    {
        return view('SKPD');
    }

    public function list_SKPD()
    {
        return view('list_SKPD');
    }


    public function wisata()
    {
        return view('wisata');
    }
    public function kuliner()
    {
        return view('kuliner');
    }
    public function nama_pejabat()
    {
        return view('nama_pejabat');
    }
}
