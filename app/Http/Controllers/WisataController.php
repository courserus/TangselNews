<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;

class WisataController extends Controller
{
    /**
     * Menyimpan data wisata ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Inisialisasi variabel untuk menyimpan nama file gambar
        $filename = null;

        // Cek apakah ada file gambar yang diupload
        if ($request->hasFile('gambar')) {
            // Ambil file yang diupload
            $file = $request->file('gambar');
            // Generate nama file unik
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            // Pindahkan file ke direktori public/images
            $file->move(public_path('images'), $filename);
        }

        // Simpan data ke database
        Wisata::create([
            'nama_wisata' => $request->nama_wisata,
            'lokasi' => $request->lokasi,
            'deskripsi' => strip_tags($request->deskripsi), // Menghapus tag HTML jika diperlukan
            'kategori' => $request->kategori,
            'gambar' => $filename,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Informasi Wisata berhasil ditambahkan!');
    }
}
