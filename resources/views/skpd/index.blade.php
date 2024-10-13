@extends('layouts.app')

@section('title', 'Daftar SKPD')

@section('content')
    <div class="container">
        <h2>Daftar SKPD</h2>

        <a href="{{ route('skpd.create') }}" class="btn btn-primary mb-3">Tambah SKPD</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama SKPD</th>
                    <th>Inisial</th>
                    <th>Titik Latitude</th>
                    <th>Titik Longitude</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skpdList as $index => $skpd)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $skpd->nama_skpd }}</td>
                        <td>{{ $skpd->inisial }}</td>
                        <td>{{ $skpd->titik_latitude }}</td>
                        <td>{{ $skpd->titik_longitude }}</td>
                        <td>{{ $skpd->no_telp }}</td>
                        <td>{{ $skpd->alamat }}</td>
                        <td>
                            <a href="{{ route('skpd.show', $skpd->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('skpd.edit', $skpd->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('skpd.destroy', $skpd->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus SKPD ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $skpdList->links() }} <!-- Untuk pagination -->
    </div>
@endsection
