@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Walikota</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Edit Data Walikota</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('walikota.update', $walikota->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul" value="{{ $walikota->judul }}" required />
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Upload Gambar (biarkan kosong jika tidak ingin mengubah)</label>
                                    <input type="file" name="gambar" class="form-control" id="gambar" accept="image/*" />
                                    @if($walikota->gambar)
                                        <img src="{{ asset('images/' . $walikota->gambar) }}" alt="{{ $walikota->judul }}" width="100" class="mt-2">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="konten">Konten</label>
                                    <textarea name="konten" class="form-control" id="myTextarea" rows="5" required>{{ $walikota->konten }}</textarea>
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
