    @extends('layouts.app')

    @section('title', 'Tambah Pengguna')

    @section('content')
        <div class="container">
            <h1>Tambah Pengguna</h1>

            <form action="{{ route('master_user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="subscribe">Subscribe</label>
                    <input type="checkbox" name="subscribe" id="subscribe">
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role" required>
                        <option value="admin">Admin</option>
                        <option value="author">Author</option>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('master_user.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    @endsection
