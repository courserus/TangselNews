@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Data Wakil Walikota</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('wakil_walikota.update', $wakil->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul" value="{{ $wakil->judul }}" required />
                            </div>
                            <div class="form-group">
                                <label for="gambar">Upload Gambar</label>
                                <input type="file" name="gambar" class="form-control" id="gambar" accept="image/*" />
                                <img src="{{ asset('images/' . $wakil->gambar) }}" alt="Gambar" width="100" class="mt-2">
                            </div>
                            <div class="form-group">
                                <label for="konten">Konten</label>
                                <textarea name="konten" class="form-control" id="myTextarea" rows="5" placeholder="Masukkan konten...">{{ $wakil->konten }}</textarea>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger" onclick="window.history.back();">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
