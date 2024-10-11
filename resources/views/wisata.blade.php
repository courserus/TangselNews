@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Informasi Wisata</h3>
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
                        <a href="#">Wisata</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Detail Wisata</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Detail Wisata</div>
                        </div>
                        <div class="card-body">
                            <!-- Menampilkan Pesan Sukses -->
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Formulir Wisata -->
                            <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <!-- Form Nama Wisata -->
                                        <div class="form-group">
                                            <label for="nama_wisata">Nama Wisata</label>
                                            <input type="text" name="nama_wisata" class="form-control" id="nama_wisata"
                                                placeholder="Masukkan Nama Wisata" required />
                                        </div>

                                        <!-- Form Lokasi -->
                                        <div class="form-group">
                                            <label for="lokasi">Lokasi Wisata</label>
                                            <input type="text" name="lokasi" class="form-control" id="lokasi"
                                                placeholder="Masukkan Lokasi Wisata" required />
                                        </div>

                                        <!-- Form Deskripsi -->
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi Wisata</label>
                                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                                placeholder="Masukkan Deskripsi Wisata" required></textarea>
                                        </div>

                                        <!-- Form Kategori -->
                                        <div class="form-group">
                                            <label for="kategori">Kategori</label>
                                            <input type="text" name="kategori" class="form-control" id="kategori"
                                                placeholder="Masukkan Kategori Wisata" />
                                        </div>

                                        <!-- Form Gambar -->
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
                                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/wisata')) }}"
                                                    target="_blank">
                                                    <i class="fab fa-facebook"></i> <!-- Ikon Facebook -->
                                                </a>

                                                <!-- Tombol Twitter -->
                                                <a class="btn btn-outline-info"
                                                    href="https://twitter.com/intent/tweet?text={{ urlencode('Informasi Wisata') }}&url={{ urlencode(url('/wisata')) }}"
                                                    target="_blank">
                                                    <i class="fab fa-twitter"></i> <!-- Ikon Twitter -->
                                                </a>

                                                <!-- Tombol WhatsApp -->
                                                <a class="btn btn-outline-success"
                                                    href="https://api.whatsapp.com/send?text={{ urlencode('Informasi Wisata: ' . url('/wisata')) }}"
                                                    target="_blank">
                                                    <i class="fab fa-whatsapp"></i> <!-- Ikon WhatsApp -->
                                                </a>

                                                <!-- Tombol LinkedIn -->
                                                <a class="btn btn-outline-primary"
                                                    href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url('/wisata')) }}&title={{ urlencode('Informasi Wisata') }}&summary={{ urlencode('Deskripsi Wisata') }}&source=YourWebsite"
                                                    target="_blank">
                                                    <i class="fab fa-linkedin"></i> <!-- Ikon LinkedIn -->
                                                </a>

                                                <!-- Tombol Telegram -->
                                                <a class="btn btn-outline-info"
                                                    href="https://t.me/share/url?url={{ urlencode(url('/wisata')) }}&text={{ urlencode('Informasi Wisata') }}"
                                                    target="_blank">
                                                    <i class="fab fa-telegram"></i> <!-- Ikon Telegram -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Cancel</button>
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
    </div>
@endsection
