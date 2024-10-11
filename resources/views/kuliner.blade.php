@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Informasi Kuliner</h3>
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
                        <a href="#">Kuliner</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Formulir Kuliner</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tambah Informasi Kuliner</div>
                        </div>
                        <div class="card-body">
                            <!-- Menampilkan Pesan Sukses -->
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('kuliner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <!-- Formulir Kuliner -->

                                        <div class="form-group">
                                            <label for="nama_kuliner">Nama Kuliner</label>
                                            <input type="text" name="nama_kuliner" class="form-control" id="nama_kuliner"
                                                placeholder="Masukkan nama kuliner" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5" placeholder="Masukkan deskripsi kuliner" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" name="kategori" class="form-control" id="kategori"
                                                placeholder="Masukkan kategori kuliner" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" name="gambar" class="form-control" id="gambar" accept="image/*" />
                                        </div>

                                        <!-- Tombol Berbagi Sosial Media dengan Ikon -->
                                        <div class="form-group">
                                            <label for="share">Bagikan ke:</label>
                                            <div>
                                                <!-- Tombol Facebook -->
                                                <a class="btn btn-outline-primary"
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/kuliner')) }}"
                                                    target="_blank">
                                                    <i class="fab fa-facebook"></i> <!-- Ikon Facebook -->
                                                </a>

                                                <!-- Tombol Twitter -->
                                                <a class="btn btn-outline-info"
                                                    href="https://twitter.com/intent/tweet?text={{ urlencode('Informasi Kuliner') }}&url={{ urlencode(url('/kuliner')) }}"
                                                    target="_blank">
                                                    <i class="fab fa-twitter"></i> <!-- Ikon Twitter -->
                                                </a>

                                                <!-- Tombol WhatsApp -->
                                                <a class="btn btn-outline-success"
                                                    href="https://api.whatsapp.com/send?text={{ urlencode('Informasi Kuliner: ' . url('/kuliner')) }}"
                                                    target="_blank">
                                                    <i class="fab fa-whatsapp"></i> <!-- Ikon WhatsApp -->
                                                </a>

                                                <!-- Tombol LinkedIn -->
                                                <a class="btn btn-outline-primary"
                                                    href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url('/kuliner')) }}&title={{ urlencode('Informasi Kuliner') }}&summary={{ urlencode('Deskripsi Kuliner') }}&source=YourWebsite"
                                                    target="_blank">
                                                    <i class="fab fa-linkedin"></i> <!-- Ikon LinkedIn -->
                                                </a>

                                                <!-- Tombol Telegram -->
                                                <a class="btn btn-outline-info"
                                                    href="https://t.me/share/url?url={{ urlencode(url('/kuliner')) }}&text={{ urlencode('Informasi Kuliner') }}"
                                                    target="_blank">
                                                    <i class="fab fa-telegram"></i> <!-- Ikon Telegram -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-center">
                <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Bantuan </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Lisensi </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    2024, PortalTangsel
                </div>
            </div>
        </footer>
    @endsection
