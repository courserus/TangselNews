@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <!-- Header -->
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Berita</h3>
        </div>

        <!-- Notifikasi Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Edit Berita -->
        <form action="{{ route('berita.update', $berita->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="myTextarea" name="content" rows="5" placeholder="Masukkan konten..."></textarea>
            </div>
            <div class="container-fluid d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('berita') }}" class="btn btn-danger ml-2">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
