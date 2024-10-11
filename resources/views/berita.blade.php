@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Berita</h3>
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
                    <a href="#">Konten Profil</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Berita</a>
                </li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('berita.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" id="myTextarea" name="content" rows="5" placeholder="Masukkan konten..."></textarea>
            </div>
            <div class="container-fluid d-flex justify-content-center">
                <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Berita</a>
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('berita.index') }}" class="btn btn-danger">Cancel</a> <!-- Ubah di sini -->
            </div>
            
        </form>

        <!-- Tampilkan daftar berita dari database -->
        <div class="mt-4">
            <h4>Daftar Berita</h4>
            @if($berita->isEmpty())
                <p>Tidak ada berita yang tersedia.</p>
            @else
                <ul class="list-group">
                    @foreach($berita as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item->content }} <!-- Sesuaikan dengan kolom yang ada di tabel berita -->
                            <div>
                                <!-- Tombol Edit -->
                                <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <!-- Tombol Hapus (opsional, jika ingin menghapus berita) -->
                                <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
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
