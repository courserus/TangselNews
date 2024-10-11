<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Menampilkan daftar Visi & Misi.
     */
    public function index()
    {
        $visiMisis = VisiMisi::all();
        return view('visi_misi.index', compact('visiMisis'));
    }

    /**
     * Menampilkan form untuk membuat Visi & Misi baru.
     */
    public function create()
    {
        return view('visi_misi.create');
    }

    /**
     * Menyimpan Visi & Misi baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        VisiMisi::create($request->all());

        return redirect()->route('visi.misi.index')->with('success', 'Visi & Misi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit untuk Visi & Misi tertentu.
     */
    public function edit(VisiMisi $visiMisi)
    {
        return view('visi_misi.edit', compact('visiMisi'));
    }

    /**
     * Memperbarui Visi & Misi tertentu di database.
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $visiMisi->update($request->all());

        return redirect()->route('visi.misi.index')->with('success', 'Visi & Misi berhasil diperbarui.');
    }

    /**
     * Menghapus Visi & Misi tertentu dari database.
     */
    public function destroy(VisiMisi $visiMisi)
    {
        $visiMisi->delete();

        return redirect()->route('visi.misi.index')->with('success', 'Visi & Misi berhasil dihapus.');
    }
}
