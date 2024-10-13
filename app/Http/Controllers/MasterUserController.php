<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MasterUserController extends Controller
{
    public function index()
    {
        $master_user = User::all();
        return view('master_user.index', compact('master_user'));
    }

    public function create()
    {
        return view('master_user.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'subscribe' => 'boolean',
            'role' => 'required|in:admin,author,reader',
        ]);

        // Simpan data ke dalam database
        User::create($validatedData);

        // Redirect setelah berhasil menyimpan
        return redirect()->route('master_user.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Dapatkan data user berdasarkan ID
        return view('master_user.edit', compact('user')); // Menampilkan form edit
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Mengabaikan email user yang sedang diupdate
            'subscribe' => 'boolean',
            'role' => 'required|in:admin,author,reader',
        ]);

        // Update data user berdasarkan ID
        $user = User::findOrFail($id); // Memastikan user ada sebelum melakukan update
        $user->update($validatedData); // Update data user

        // Redirect setelah berhasil memperbarui
        return redirect()->route('master_user.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Memastikan user ada sebelum menghapus
        $user->delete(); // Hapus data user berdasarkan ID

        // Redirect setelah berhasil menghapus
        return redirect()->route('master_user.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
