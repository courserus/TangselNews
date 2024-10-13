<?php

namespace App\Http\Controllers;

use App\Models\TambahMenu;
use Illuminate\Http\Request;

class TambahMenuController extends Controller
{
    // Menampilkan daftar menu
    public function index()
    {
        $menus = TambahMenu::all(); // Mengambil semua data menu
        return view('tambah_menu.index', compact('menus'));
    }

    // Menampilkan form untuk menambahkan menu baru
    public function create()
    {
        return view('tambah_menu.create');
    }

    // Menyimpan menu baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'url_menu' => 'required|string|max:255',
            'icon_menu' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        TambahMenu::create($request->all());

        return redirect()->route('tambah_menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit menu
    public function edit($id)
    {
        $menu = TambahMenu::findOrFail($id);
        return view('tambah_menu.edit', compact('menu'));
    }

    // Mengupdate menu
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'url_menu' => 'required|string|max:255',
            'icon_menu' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $menu = TambahMenu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('tambah_menu.index')->with('success', 'Menu berhasil diperbarui.');
    }

    // Menghapus menu
    public function destroy($id)
    {
        $menu = TambahMenu::findOrFail($id);
        $menu->delete();

        return redirect()->route('tambah_menu.index')->with('success', 'Menu berhasil dihapus.');
    }
}
