@extends('layouts.app')

@section('title', 'Edit SKPD')

@section('content')
    <div class="container">
        <h2>Edit SKPD</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('skpd.update', $skpd->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_skpd" class="form-label">Nama SKPD</label>
                <input type="text" class="form-control" id="nama_skpd" name="nama_skpd"
                    value="{{ old('nama_skpd', $skpd->nama_skpd) }}" required>
            </div>

            <div class="mb-3">
                <label for="inisial" class="form-label">Inisial</label>
                <input type="text" class="form-control" id="inisial" name="inisial"
                    value="{{ old('inisial', $skpd->inisial) }}" required>
            </div>

            <div class="mb-3">
                <label for="titik_latitude" class="form-label">Titik Latitude</label>
                <input type="number" step="any" class="form-control" id="titik_latitude" name="titik_latitude"
                    value="{{ old('titik_latitude', $skpd->titik_latitude) }}" required>
            </div>

            <div class="mb-3">
                <label for="titik_longitude" class="form-label">Titik Longitude</label>
                <input type="number" step="any" class="form-control" id="titik_longitude" name="titik_longitude"
                    value="{{ old('titik_longitude', $skpd->titik_longitude) }}" required>
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp"
                    value="{{ old('no_telp', $skpd->no_telp) }}">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $skpd->alamat) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="isi_bagan" class="form-label">Isi Bagan</label>
                <textarea class="form-control" id="isi_bagan" name="isi_bagan">{{ old('isi_bagan', $skpd->isi_bagan) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update SKPD</button>
            <a href="{{ route('skpd.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
