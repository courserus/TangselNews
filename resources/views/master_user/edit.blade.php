@extends('layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
    <div class="container">
        <h1>Edit Pengguna</h1>

        {{-- Menampilkan pesan kesalahan --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Menampilkan pesan sukses jika ada --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('master_user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="form-group">
                <label for="subscribe">Subscribe</label>
                <input type="checkbox" name="subscribe" id="subscribe"
                    {{ old('subscribe', $user->subscribe) ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="author" {{ old('role', $user->role) == 'author' ? 'selected' : '' }}>Author</option>
                    <option value="reader" {{ old('role', $user->role) == 'reader' ? 'selected' : '' }}>Reader</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('master_user.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
