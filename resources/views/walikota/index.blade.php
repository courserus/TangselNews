@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Walikota</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Daftar Walikota</div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <a href="{{ route('walikota.create') }}" class="btn btn-primary mb-3">Tambah Walikota</a>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Konten</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($walikota as $data)
                                        <tr>
                                            <td>{{ $data->judul }}</td>
                                            <td><img src="{{ asset('images/' . $data->gambar) }}" alt="{{ $data->judul }}" width="100"></td>
                                            <td>{{ $data->konten }}</td>
                                            <td>
                                                <a href="{{ route('walikota.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('walikota.destroy', $data->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
