@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Upload Video</h3>
                <!-- Breadcrumbs -->
            </div>

            <!-- Pesan Sukses dan Error -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Error Validasi -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulir Upload Video -->
            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul Video</label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Masukkan Judul Video" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="video_file">Pilih Video</label>
                    <input type="file" class="form-control" id="video_file" name="video_file" accept="video/*" required>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Video</label>
                    <textarea class="form-control" id="description" name="description" rows="5"
                        placeholder="Masukkan deskripsi video..." required>{{ old('description') }}</textarea>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger ml-3">Cancel</button>
                </div>
            </form>

        </div>
    </div>

    <!-- Footer -->
@endsection
