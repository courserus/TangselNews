@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Wakil Walikota</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Daftar Wakil Walikota</div>
                        <a href="{{ route('wakil_walikota.create') }}" class="btn btn-primary">Tambah Wakil Walikota</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>JUDUL</th>
                                    <th>KONTEN</th>
                                    <th>GAMBAR</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wakilWalikota as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{!! $item->konten !!}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $item->gambar) }}" alt="Gambar" style="max-width: 100px; max-height: 100px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('wakil_walikota.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('wakil_walikota.destroy', $item->id) }}" method="POST" style="display:inline;">
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
