@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
    <div class="container">
        <h1>Edit Menu</h1>
        <form action="{{ route('tambah_menu.update', $menu->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_menu">Nama Menu</label>
                <input type="text" name="nama_menu" class="form-control" value="{{ $menu->nama_menu }}" required>
            </div>
            <div class="form-group">
                <label for="url_menu">URL Menu</label>
                <input type="text" name="url_menu" class="form-control" value="{{ $menu->url_menu }}" required>
            </div>
            <div class="form-group">
                <label for="icon_menu">Icon Menu</label>
                <input type="text" name="icon_menu" class="form-control" value="{{ $menu->icon_menu }}">
            </div>
            <div class="form-group">
                <label for="is_active">Aktif</label>
                <select name="is_active" class="form-control">
                    <option value="1" {{ $menu->is_active ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ !$menu->is_active ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('tambah_menu.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
