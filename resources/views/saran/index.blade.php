@extends('layouts.app') <!-- Ganti dengan layout yang sesuai -->

@section('content')
    <div class="container">
        <h1>Daftar Saran</h1>

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
                    </tr>
                </thead>

            </table>
        @endif
    </div>
@endsection
