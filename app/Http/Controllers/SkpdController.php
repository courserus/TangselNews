<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    // Method untuk menampilkan daftar SKPD dengan paginasi
    public function index()
    {
        // Mengambil data SKPD dengan paginasi, misalnya 10 per halaman
        $skpdList = Skpd::paginate(10);

        // Mengirimkan data ke view
        return view('skpd.index', compact('skpdList'));
    }

    // Method untuk menampilkan form tambah SKPD baru
    public function create()
    {
        return view('skpd.create');
    }

    // Method untuk menyimpan data SKPD baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_skpd' => 'required|string|max:100',
            'inisial' => 'required|string|max:10',
            'titik_latitude' => 'required|numeric',
            'titik_longitude' => 'required|numeric',
            'no_telp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'isi_bagan' => 'nullable|string',
        ]);

        Skpd::create($request->all());

        return redirect()->route('skpd.index')->with('success', 'Data SKPD berhasil ditambahkan.');
    }

    // Method untuk menampilkan detail SKPD berdasarkan ID
    public function show($id)
    {
        $skpd = Skpd::findOrFail($id);
        return view('skpd.show', compact('skpd'));
    }

    // Method untuk menampilkan form edit SKPD
    public function edit($id)
    {
        $skpd = Skpd::findOrFail($id);
        return view('skpd.edit', compact('skpd'));
    }

    // Method untuk mengupdate data SKPD
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_skpd' => 'required|string|max:100',
            'inisial' => 'required|string|max:10',
            'titik_latitude' => 'required|numeric',
            'titik_longitude' => 'required|numeric',
            'no_telp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'isi_bagan' => 'nullable|string',
        ]);

        $skpd = Skpd::findOrFail($id);
        $skpd->update($request->all());

        return redirect()->route('skpd.index')->with('success', 'Data SKPD berhasil diperbarui.');
    }

    // Method untuk menghapus data SKPD
    public function destroy($id)
    {
        $skpd = Skpd::findOrFail($id);
        $skpd->delete();

        return redirect()->route('skpd.index')->with('success', 'Data SKPD berhasil dihapus.');
    }
}
