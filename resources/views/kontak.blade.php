@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Kontak</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">konten Profil</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">kontak</a></li>
            </ul>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pengisian Kontak User </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" value="{{ old('name', '') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">No Telp</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Masukkan no telp" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Masukkan Alamat" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" required />
                                    </div>

                                    <!-- Tombol Berbagi Sosial Media dengan Ikon -->
                                    <div class="form-group">
                                        <label for="share">Bagikan ke:</label>
                                        <div>
                                            <a class="btn btn-outline-primary" href="https://www.facebook.com/sharer/sharer.php?u=https://www.example.com/artikel-anda" target="_blank"><i class="fab fa-facebook"></i></a>
                                            <a class="btn btn-outline-info" href="https://twitter.com/intent/tweet?text=Judul%20Artikel&url=https://www.example.com/artikel-anda" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <a class="btn btn-outline-success" href="https://api.whatsapp.com/send?text=Judul%20Artikel%20https://www.example.com/artikel-anda" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                            <a class="btn btn-outline-primary" href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.example.com/artikel-anda&title=Judul%20Artikel&summary=Ringkasan%20Artikel&source=YourWebsite" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            <a class="btn btn-outline-info" href="https://t.me/share/url?url=https://www.example.com/artikel-anda&text=Judul%20Artikel" target="_blank"><i class="fab fa-telegram"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid d-flex justify-content-center">
                <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="#"> Help </a></li>
                        <li class="nav-item"><a class="nav-link" href="#"> Licenses </a></li>
                    </ul>
                </nav>
                <div class="copyright">2024, PortalTangsel</div>
            </div>
        </footer>
    </div>
</div>
@endsection
