@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Album</h1>
        <a href="{{ route('album.create') }}" class="btn btn-primary mb-3">Tambah Album</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($album as $album)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $album->judul }}</td>
                        <td>{{ $album->deskripsi }}</td>
                        <td>
                            <a href="{{ route('album.edit', $album->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('album.destroy', $album->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus album ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada album</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
