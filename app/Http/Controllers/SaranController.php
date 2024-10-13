<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    // Tampilkan daftar saran
    public function index()
    {
        $saran = Saran::all();
        return view('saran.index', compact('saran'));
    }

    // Tampilkan form untuk membuat saran baru
    public function create()
    {
        return view('saran.create');
    }

    // Simpan saran baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'isi' => 'required|string',
        ]);

        // Simpan data dengan hanya kolom yang diizinkan
        Saran::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'isi' => $request->isi,
        ]);

        return redirect()->route('saran.index')
                         ->with('success', 'Saran berhasil ditambahkan');
    }

    // Tampilkan form untuk mengedit saran
    public function edit($id)
    {
        $saran = Saran::findOrFail($id);
        return view('saran.edit', compact('saran'));
    }

    // Update saran yang ada di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'isi_saran' => 'required|string',
        ]);

        $saran = Saran::findOrFail($id);
        $saran->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'isi_saran' => $request->isi_saran,
        ]);

        return redirect()->route('saran.index')
                         ->with('success', 'Saran berhasil diperbarui');
    }

    // Hapus saran dari database
    public function destroy($id)
    {
        $saran = Saran::findOrFail($id);
        $saran->delete();

        return redirect()->route('saran.index')
                         ->with('success', 'Saran berhasil dihapus');
    }
}
