@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Saran</h1>

        <!-- Tombol Tambah Saran di sebelah kanan -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('saran.create') }}" class="btn btn-primary">Tambah Saran</a>
        </div>

        @if ($saran->isEmpty())
            <div class="alert alert-info">Belum ada saran yang diterima.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Isi Saran</th>
                        <th>Tanggal Dikirim</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saran as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->isi_saran }}</td>
                            <td>{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>
                                <!-- Tombol Edit dan Hapus -->
                                <a href="{{ route('saran.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('saran.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus saran ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
