<?php

// app/Http/Controllers/ContactController.php

// app/Http/Controllers/ContactController.php

// app/Http/Controllers/ContactController.php

// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Menampilkan semua kontak
    public function index()
    {
        $contacts = Contact::all(); // Mengambil semua data kontak
        return view('contacts.index', compact('contacts')); // Mengirim data ke view
    }

    // Menampilkan form tambah kontak
    public function create()
    {
        return view('contacts.create');
    }

    // Menyimpan kontak baru
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email'   => 'required|email|max:255|unique:contacts,email',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Mengupdate kontak
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'email'   => 'required|email|max:255|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil diupdate.');
    }

    // Menghapus kontak
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus.');
    }
}
