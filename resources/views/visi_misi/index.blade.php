<!-- resources/views/visi_misi/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Visi & Misi</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('visi.misi.index') }}">
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
                    <a href="{{ route('visi.misi.index') }}">Visi & Misi</a>
                </li>
            </ul>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Tambah Visi & Misi -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('visi.misi.create') }}" class="btn btn-primary">Tambah Visi Misi</a>
        </div>

        <!-- Form Tambah Visi & Misi (Disembunyikan Secara Default) -->
        <div id="addVisiMisiForm" style="display: none;" class="mb-4">
            <form action="{{ route('visi.misi.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="content">Konten Visi & Misi</label>
                    <textarea class="form-control" id="myTextarea" name="content" rows="5" placeholder="Masukkan konten...">{{ old('content') }}</textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success me-2">Submit</button>
                    <button type="button" id="btnCancelForm" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>

        <!-- Daftar Visi & Misi -->
        <h4 class="mt-5">Daftar Visi & Misi</h4>
        @if($visiMisis->isEmpty())
            <p>Tidak ada data Visi & Misi.</p>
        @else
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visiMisis as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->content }}</td>
                        <td>
                            <a href="{{ route('visi.misi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('visi.misi.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
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

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Menampilkan form Tambah Visi & Misi
        document.getElementById('btnAddVisiMisi').addEventListener('click', function() {
            document.getElementById('addVisiMisiForm').style.display = 'block';
            this.style.display = 'none';
        });

        // Menyembunyikan form Tambah Visi & Misi
        document.getElementById('btnCancelForm').addEventListener('click', function() {
            document.getElementById('addVisiMisiForm').style.display = 'none';
            document.getElementById('btnAddVisiMisi').style.display = 'block';
        });
    });
</script>
@endsection
