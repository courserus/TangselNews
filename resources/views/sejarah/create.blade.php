@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Sejarah Tangerang Selatan</h3> <!-- Sesuaikan sesuai kebutuhan -->
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
                        <a href="#">Sejarah Tangerang Selatan</a> <!-- Sesuaikan sesuai kebutuhan -->
                    </li>
                </ul>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Terdapat masalah dengan input Anda.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('sejarah.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="konten">Konten Sejarah</label>
                    <textarea class="form-control" name="konten" id="myTextarea" rows="5" placeholder="Masukkan konten...">{{ old('konten') }}</textarea>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success me-2">Submit</button>
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
