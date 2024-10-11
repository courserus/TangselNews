<!-- resources/views/berita/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tambah Berita</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('berita') }}">Berita</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Berita</a>
                </li>
            </ul>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content">Konten Berita</label>
                <textarea class="form-control" id="myTextarea" name="content" rows="5" placeholder="Masukkan konten..."></textarea>
            </div>
            <div class="container-fluid d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('berita') }}" class="btn btn-danger ml-2">Batal</a>
            </div>
        </form>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid d-flex justify-content-center">
        <nav class="pull-left">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Licenses </a>
                </li>
            </ul>
        </nav>
        <div class="copyright">
            2024, PortalTangsel
        </div>
    </div>
</footer>
@endsection
