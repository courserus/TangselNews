@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Sejarah Tangerang Selatan</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('sejarah.index') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sejarah.index') }}">Konten Profil</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Sejarah</a>
                    </li>
                </ul>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Terdapat masalah dengan input Anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('sejarah.update', $sejarah->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="konten">Konten Sejarah</label>
                    <textarea class="form-control" name="konten" id="konten" rows="5" placeholder="Masukkan konten...">{{ old('konten', $sejarah->konten) }}</textarea>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success me-2">Update</button>
                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Cancel</button>
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
