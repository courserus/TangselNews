@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Gambar</h1>
        <a href="{{ route('gallery.create') }}" class="btn btn-primary mb-3">Upload Gambar</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @forelse ($gallery as $gallery)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $gallery->gambar) }}" class="card-img-top" alt="Gambar">
                        <div class="card-body text-center">
                            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus gambar ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Tidak ada gambar.</p>
            @endforelse
        </div>
    </div>
@endsection
