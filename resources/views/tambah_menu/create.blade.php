@extends('layouts.app')

@section('title', 'Tambah Menu')

@section('content')
    <div class="container">
        <h1>Tambah Menu</h1>
        <form action="{{ route('tambah_menu.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_menu">Nama Menu</label>
                <input type="text" name="nama_menu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="url_menu">URL Menu</label>
                <input type="text" name="url_menu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="icon_menu">Icon Menu</label>
                <input type="text" name="icon_menu" class="form-control">
            </div>
            <div class="form-group">
                <label for="is_active">Aktif</label>
                <select name="is_active" class="form-control">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('tambah_menu.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
