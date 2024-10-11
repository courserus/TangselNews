{{-- resources/views/contacts/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tambah Kontak</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Konten Profil</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="{{ route('contacts.index') }}">Kontak</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Tambah Kontak</a></li>
            </ul>
        </div>

        <!-- Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pesan Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Tambah Kontak -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Tambah Kontak</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" value="{{ old('name') }}" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone">No Telp</label>
                                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Masukkan No Telp" value="{{ old('phone') }}" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address">Alamat</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Masukkan Alamat" value="{{ old('address') }}" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{ old('email') }}" required />
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-success">Tambah Kontak</button>
                                        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-center">
                <nav class="pull-left">
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Licenses</a></li>
                    </ul>
                </nav>
                <div class="copyright">2024, PortalTangsel</div>
            </div>
        </footer>
    </div>
</div>
@endsection
