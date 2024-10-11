<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah; // Sesuaikan dengan model Anda

class SejarahController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'konten' => 'required|string',
        ]);

        // Simpan ke database
        $sejarah = new Sejarah();
        $sejarah->konten = $request->konten;
        $sejarah->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
