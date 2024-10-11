@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="fw-bold mb-3">Lambang Daerah</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('uploadImage.create') }}" class="btn btn-primary">Tambah Lambang</a>
    </div>

    <div class="row">
        @foreach($images as $image)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ Storage::url($image->path) }}" class="card-img-top" alt="Lambang Daerah">
                <div class="card-body text-center">
                    <form action="{{ route('uploadImage.destroy', $image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('uploadImage.edit', $image->id) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection