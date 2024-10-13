@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Upload Video</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Video</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Upload Video</a>
                    </li>
                </ul>
            </div>

            <!-- Form Upload Video -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul Video</label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Masukkan Judul Video" required>
                </div>

                <div class="form-group">
                    <label for="video_file">Pilih Video</label>
                    <input type="file" class="form-control" id="video_file" name="video_file" accept="video/*" required>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Video</label>
                    <textarea class="form-control" id="description" name="description" rows="5"
                        placeholder="Masukkan deskripsi video..." required></textarea>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger ml-3">Cancel</button>
                </div>
            </form>

        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid d-flex justify-content-center">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Licenses</a>
                    </li>
                </ul>
            </nav>
            <div class="copyright">
                2024, PortalTangsel
            </div>
        </div>
    </footer>
@endsection
