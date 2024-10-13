@extends('layouts.app')

@section('title', 'Detail SKPD')

@section('content')
    <div class="container">
        <h2>Detail SKPD</h2>

        <div class="mb-3">
            <strong>Nama SKPD:</strong> {{ $skpd->nama_skpd }}
        </div>

        <div class="mb-3">
            <strong>Inisial:</strong> {{ $skpd->inisial }}
        </div>

        <div class="mb-3">
            <strong>Titik Latitude:</strong> {{ $skpd->titik_latitude }}
        </div>

        <div class="mb-3">
            <strong>Titik Longitude:</strong> {{ $skpd->titik_longitude }}
        </div>

        <div class="mb-3">
            <strong>No Telepon:</strong> {{ $skpd->no_telp }}
        </div>

        <div class="mb-3">
            <strong>Alamat:</strong> {{ $skpd->alamat }}
        </div>

        <div class="mb-3">
            <strong>Isi Bagan:</strong> {{ $skpd->isi_bagan }}
        </div>

        <a href="{{ route('skpd.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('skpd.edit', $skpd->id) }}" class="btn btn-warning">Edit</a>
    </div>
@endsection
