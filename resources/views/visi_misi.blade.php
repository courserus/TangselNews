@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Visi & Misi</h3>
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
                    <a href="{{ route('visi.misi.index') }}">Visi & Misi</a>
                </li>
            </ul>
        </div>
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('visi.misi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea class="form-control" id="myTextarea" name="content" rows="5" placeholder="Masukkan konten..."></textarea>
            </div>
            <div class="container-fluid d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('visi.misi.index') }}" class="btn btn-danger">Cancel</a>
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
