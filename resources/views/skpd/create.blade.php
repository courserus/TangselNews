@extends('layouts.app')

@section('title', 'Tambah SKPD')

@section('content')
    <div class="container">
        <h2>Tambah SKPD</h2>

        <form action="{{ route('skpd.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_skpd" class="form-label">Nama SKPD</label>
                <input type="text" class="form-control @error('nama_skpd') is-invalid @enderror" id="nama_skpd"
                    name="nama_skpd" value="{{ old('nama_skpd') }}" required>
                @error('nama_skpd')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inisial" class="form-label">Inisial</label>
                <input type="text" class="form-control @error('inisial') is-invalid @enderror" id="inisial"
                    name="inisial" value="{{ old('inisial') }}" required>
                @error('inisial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="titik_latitude" class="form-label">Titik Latitude</label>
                <input type="text" class="form-control @error('titik_latitude') is-invalid @enderror" id="titik_latitude"
                    name="titik_latitude" value="{{ old('titik_latitude') }}" required>
                @error('titik_latitude')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="titik_longitude" class="form-label">Titik Longitude</label>
                <input type="text" class="form-control @error('titik_longitude') is-invalid @enderror"
                    id="titik_longitude" name="titik_longitude" value="{{ old('titik_longitude') }}" required>
                @error('titik_longitude')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                    name="no_telp" value="{{ old('no_telp') }}" required>
                @error('no_telp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                    required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('skpd.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
