<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image; // Pastikan model ini sesuai dengan tabel Anda
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    /**
     * Menampilkan semua gambar lambang daerah.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $images = Image::all(); // Mengambil semua data gambar
        return view('uploadImage.index', compact('images'));
    }

    /**
     * Menampilkan form untuk menambahkan gambar baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('uploadImage.create');
    }

    /**
     * Menyimpan gambar baru ke storage dan database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Simpan gambar ke storage
        $path = $request->file('image')->store('images', 'public');

        // Simpan path gambar di database
        Image::create(['path' => $path]);

        return redirect()->route('uploadImage.index')->with('success', 'Gambar berhasil diunggah.');
    }

    /**
     * Menampilkan form untuk mengedit gambar tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('uploadImage.edit', compact('image'));
    }

    /**
     * Memperbarui gambar tertentu di storage dan database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);

        // Validasi permintaan
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi jika ingin mengganti gambar
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            Storage::disk('public')->delete($image->path);

            // Simpan gambar baru ke storage
            $path = $request->file('image')->store('images', 'public');

            // Update path gambar di database
            $image->path = $path;
        }

        $image->save();

        return redirect()->route('uploadImage.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    /**
     * Menghapus gambar tertentu dari storage dan database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        // Hapus gambar dari storage
        Storage::disk('public')->delete($image->path);

        // Hapus record dari database
        $image->delete();

        return redirect()->route('uploadImage.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
