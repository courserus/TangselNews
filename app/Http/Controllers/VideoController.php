<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    // Menampilkan form upload video
    public function index()
    {
        return view('video.upload');
    }

    // Menyimpan video yang diupload
    public function store(Request $request)
    {
        // Debug: Periksa apakah metode dipanggil
        Log::info('Metode store dipanggil');

        // Pastikan pengguna sudah diautentikasi
        if (!Auth::check()) {
            Log::warning('Pengguna tidak terautentikasi');
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video_file' => 'required|mimes:mp4,avi,mov|max:20480', // Maksimum 20MB
            'description' => 'required|string|max:500',
        ]);

        // Debug: Tampilkan data yang telah divalidasi
        Log::info('Data divalidasi', $validated);

        // Jika file video ada
        if ($request->hasFile('video_file')) {
            try {
                // Menyimpan video ke folder "videos" di storage
                $path = $request->file('video_file')->store('videos', 'public');
                Log::info('Video disimpan di path: ' . $path);

                // Pastikan `Auth::user()->email` mengembalikan nilai
                $creatorEmail = Auth::user()->email;
                if (!$creatorEmail) {
                    Log::warning('Email pengguna tidak ditemukan');
                    return redirect()->route('video.upload')->with('error', 'Email pengguna tidak ditemukan.');
                }

                // Simpan data video ke database
                $video = Video::create([
                    'title' => $request->title,
                    'creator' => $creatorEmail,
                    'link' => $path, // Simpan path file video di kolom 'link'
                    'description' => $request->description,
                ]);
                Log::info('Data video disimpan di database dengan ID: ' . $video->id);

                // Redirect dengan pesan sukses
                return redirect()->route('video.upload')->with('success', 'Video berhasil diupload!');
            } catch (\Exception $e) {
                Log::error('Gagal menyimpan video: ' . $e->getMessage());
                return redirect()->route('video.upload')->with('error', 'Gagal mengupload video: ' . $e->getMessage());
            }
        }

        Log::warning('Tidak ada file video yang diupload');
        return redirect()->route('video.upload')->with('error', 'Gagal mengupload video');
    }
}
