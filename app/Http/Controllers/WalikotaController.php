<?php

namespace App\Http\Controllers;

use App\Models\Walikota; // Pastikan model sudah ada
use Illuminate\Http\Request;

class WalikotaController extends Controller
{
    public function index()
    {
        $walikota = Walikota::all(); // Ambil semua data walikota
        return view('walikota.index', compact('walikota'));
    }

    public function create()
    {
        return view('walikota.create'); // Tampilkan form input
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data walikota
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'konten' => 'required',
        ]);

        $walikota = new Walikota();
        $walikota->judul = $request->judul;
        $walikota->konten = $request->konten;

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $walikota->gambar = $filename;
        }

        $walikota->save();

        return redirect()->route('walikota.index')->with('success', 'Data walikota berhasil disimpan.');
    }

    public function edit($id)
    {
        $walikota = Walikota::find($id);
        return view('walikota.edit', compact('walikota'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data walikota
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'konten' => 'required',
        ]);

        $walikota = Walikota::find($id);
        $walikota->judul = $request->judul;
        $walikota->konten = $request->konten;

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($walikota->gambar) {
                unlink(public_path('images/' . $walikota->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $walikota->gambar = $filename;
        }

        $walikota->save();

        return redirect()->route('walikota.index')->with('success', 'Data walikota berhasil diupdate.');
    }

    public function destroy($id)
    {
        $walikota = Walikota::find($id);
        if ($walikota->gambar) {
            unlink(public_path('images/' . $walikota->gambar));
        }
        $walikota->delete();

        return redirect()->route('walikota.index')->with('success', 'Data walikota berhasil dihapus.');
    }
}
