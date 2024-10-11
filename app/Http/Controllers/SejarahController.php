<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;

class SejarahController extends Controller
{
    // Menampilkan semua data sejarah
    public function index()
    {
        $dataSejarah = Sejarah::all();
        return view('sejarah.index', compact('dataSejarah'));
    }

    // Menampilkan form untuk membuat sejarah baru
    public function create()
    {
        return view('sejarah.create');
    }

    // Menyimpan data sejarah baru
    public function store(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        Sejarah::create($request->all());
        return redirect()->route('sejarah.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit sejarah
    public function edit($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('sejarah.edit', compact('sejarah'));
    }

    // Memperbarui data sejarah
    public function update(Request $request, $id)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        $sejarah = Sejarah::findOrFail($id);
        $sejarah->update($request->all());
        return redirect()->route('sejarah.index')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus data sejarah
    public function destroy($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->delete();
        return redirect()->route('sejarah.index')->with('success', 'Data berhasil dihapus');
    }
}
