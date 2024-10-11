@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-3">Edit Lambang Daerah</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('uploadImage.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="image">Pilih Gambar Baru (Opsional):</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        @if ($image->path)
            <div class="form-group mb-3">
                <img src="{{ Storage::url($image->path) }}" alt="Lambang Daerah" width="200">
            </div>
        @endif
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('uploadImage.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
