@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Sejarah Tangerang Selatan</h3>
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
                        <a href="#">Konten Profil</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Sejarah Tangerang Selatan</a>
                    </li>
                </ul>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('sejarah.create') }}" class="btn btn-primary">Tambah Sejarah</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Konten</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataSejarah as $index => $sejarah)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sejarah->konten }}</td>
                            <td>
                                <a href="{{ route('sejarah.edit', $sejarah->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('sejarah.destroy', $sejarah->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if($dataSejarah->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data sejarah.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
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
