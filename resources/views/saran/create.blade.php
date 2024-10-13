@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Kumpulkan Saran dari Pembaca</h3>
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
                        <a href="#">Saran Pembaca</a>
                    </li>
                </ul>
            </div>

            <!-- Formulir untuk menambahkan saran -->
            <form action="{{ route('saran.store') }}" method="POST">
                @csrf <!-- Token CSRF untuk keamanan -->
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="nama" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="form-group">
                    <label for="suggestion">Saran</label>
                    <textarea class="form-control" id="suggestion" name="isi" rows="5" placeholder="Masukkan saran..." required></textarea>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-success me-2">Kirim Saran</button>
                    <a href="{{ route('saran.index') }}" class="btn btn-danger">Batal</a>
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
