@extends('layouts.app')

@section('title', 'Daftar Menu')

@section('content')
    <div class="container">
        <h1>Daftar Menu</h1>
        <a href="{{ route('tambah_menu.create') }}" class="btn btn-primary">Tambah Menu</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Menu</th>
                    <th>URL Menu</th>
                    <th>Icon Menu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->url_menu }}</td>
                        <td>{{ $menu->icon_menu }}</td>
                        <td>{{ $menu->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>
                            <a href="{{ route('tambah_menu.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tambah_menu.destroy', $menu->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
