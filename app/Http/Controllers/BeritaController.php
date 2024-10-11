<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string|max:1000', // Adjust the max length as needed
        ]);

        // Create a new entry in the database
        Berita::create([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('berita')->with('success', 'Berita saved successfully!');
    }

    public function index() 
    {
        $berita = Berita::all(); // Mengambil semua data berita dari database
        return view('berita.index', compact('berita')); // Mengirim data berita ke view
    }
    public function create() 
    {
        return view('berita.create');
    }
    public function edit($id) 
    {
        $berita = Berita::findOrFail($id); // Mengambil data berita berdasarkan ID
        return view('berita.edit', compact('berita')); // Mengirim data berita ke view
    }
    public function update(Request $request, $id) 
    {
        $berita = Berita::findOrFail($id);
        $berita->update($request->all()); // Update data berita
        return redirect()->route('berita')->with('success', 'Berita berhasil diperbarui');
    }
    
    public function destroy($id) {
        $berita = Berita::findOrFail($id); // Mencari berita berdasarkan ID
        $berita->delete(); // Menghapus berita dari database
        return redirect()->route('berita')->with('success', 'Berita berhasil dihapus'); // Redirect dengan pesan sukses
    }
    
    
}
