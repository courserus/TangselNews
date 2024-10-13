@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Upload Gambar</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="gambar" class="form-label">Pilih Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
