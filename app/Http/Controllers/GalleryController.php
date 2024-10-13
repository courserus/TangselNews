<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all(); // Mengambil semua data dari model Gallery
        return view('gallery.index', compact('gallery')); // Mengirimkan data ke view
    }

    public function create()
    {
        // Mengarahkan ke view untuk form upload gambar
        return view('gallery.create'); // Pastikan view ini ada
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan gambar ke dalam storage
        $path = $request->file('gambar')->store('gallery', 'public');

        // Buat data di tabel gallery
        Gallery::create([
            'gambar' => $path,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil diupload.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus file gambar dari storage
        if (Storage::disk('public')->exists($gallery->gambar)) {
            Storage::disk('public')->delete($gallery->gambar);
        }

        // Hapus data dari database
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
