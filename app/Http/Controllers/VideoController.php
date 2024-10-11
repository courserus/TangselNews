<?php

namespace App\Http\Controllers;

use App\Models\Video; // Perbaiki nama namespace untuk model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // Menampilkan form upload video
    public function index()
    {
        return view('upload'); // Pastikan file view sudah dibuat
    }

    // Menyimpan video yang diupload
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'video_file' => 'required|mimes:mp4,avi,mov|max:20480', // Maksimum 20MB
            'description' => 'required|string|max:500',
        ]);

        // Jika file video ada
        if ($request->hasFile('video_file')) {
            // Menyimpan video ke folder "videos" di storage
            $path = $request->file('video_file')->store('videos', 'public');

            // Simpan data video ke database
            $video = Video::create([
                'title' => $request->title,
                'url' => $path, // Simpan path file video di kolom 'url'
                'description' => $request->description,
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('video.upload')->with('success', 'Video berhasil diupload!');
        }

        return redirect()->route('video.upload')->with('error', 'Gagal mengupload video');
    }
}
