<?php

namespace App\Http\Controllers;

use App\Models\WakilWalikota; // Pastikan model sudah ada
use Illuminate\Http\Request;

class WakilWalikotaController extends Controller
{
    public function index()
{
    $wakilWalikota = WakilWalikota::all(); // Mengambil semua data wakil walikota
    return view('wakil_walikota.index', compact('wakilWalikota')); // Pastikan ini konsisten
}


    public function create()
    {
        return view('wakil_walikota.create'); // Tampilkan form input
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data wakil walikota
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'konten' => 'required',
        ]);

        $wakil = new WakilWalikota();
        $wakil->judul = $request->judul;
        $wakil->konten = $request->konten;

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $wakil->gambar = $filename;
        }

        $wakil->save();

        return redirect()->route('wakil_walikota.index')->with('success', 'Data wakil walikota berhasil disimpan.');
    }

    public function edit($id)
    {
        $wakil = WakilWalikota::find($id);
        return view('wakil_walikota.edit', compact('wakil'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data wakil walikota
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'konten' => 'required',
        ]);

        $wakil = WakilWalikota::find($id);
        $wakil->judul = $request->judul;
        $wakil->konten = $request->konten;

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($wakil->gambar) {
                unlink(public_path('images/' . $wakil->gambar));
            }
            $file = $request->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $wakil->gambar = $filename;
        }

        $wakil->save();

        return redirect()->route('wakil_walikota.index')->with('success', 'Data wakil walikota berhasil diupdate.');
    }

    public function destroy($id)
    {
        $wakil = WakilWalikota::find($id);
        if ($wakil->gambar) {
            unlink(public_path('images/' . $wakil->gambar));
        }
        $wakil->delete();

        return redirect()->route('wakil_walikota.index')->with('success', 'Data wakil walikota berhasil dihapus.');
    }
}
