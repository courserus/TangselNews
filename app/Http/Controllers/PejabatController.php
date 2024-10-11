<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pejabat;

class PejabatController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/pejabat', $filename, 'public');
        }

        // Simpan data ke database
        Pejabat::create([
            'judul' => $validatedData['judul'],
            'konten' => $validatedData['konten'],
            'gambar' => isset($filePath) ? $filePath : null,
        ]);

        return redirect()->back()->with('success', 'Data successfully submitted!');
    }
}
