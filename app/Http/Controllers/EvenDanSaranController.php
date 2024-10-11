<?php

namespace App\Http\Controllers;

use App\Models\tambahmenu;
use Illuminate\Http\Request;

class EvenDanSaranController extends Controller
{
    // Menampilkan form tambah menu
    public function tambah_Menu()
    {
        return view('tambah_menu');
    }

    // Menyimpan data menu yang diinputkan
    public function storeMenu(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'link_menu' => 'required|url|max:255',
            'ikon' => 'nullable|string|max:255', // Ikon opsional
        ]);

        // Simpan data menu ke database
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'link_menu' => $request->link_menu,
            'ikon' => $request->ikon,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('menu.list')->with('success', 'Menu berhasil ditambahkan!');
    }

    // Menampilkan daftar menu
    public function list_menu()
    {
        $menus = Menu::all();
        return view('list_menu', compact('menus'));
    }

    // Menampilkan halaman saran (bisa diisi nanti)
    public function saran()
    {
        return view('saran');
    }
}
