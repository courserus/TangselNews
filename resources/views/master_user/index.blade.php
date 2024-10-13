@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
    <div class="container">
        <h1>Daftar Pengguna</h1>
        <a href="{{ route('master_user.create') }}" class="btn btn-success mb-3">Tambah Pengguna</a>
        <!-- Form pencarian -->
        <form action="{{ route('master_user.index') }}" method="GET" class="d-flex mb-">
            <input type="text" name="search" class="form-control" placeholder="Cari pengguna..."
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary ml-2">Cari</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subscribe</th>
                    <th>Role</th>
                    <th>aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($master_user as $user)
                    <!-- Ganti nama variabel -->
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->subscribe ? 'AKTIF' : 'NON-AKTIF' }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('master_user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('master_user.index', $user->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
