@extends('dashboard.layouts.main')

@section('container')
<div class="row justify-content-center my-4">
    <div class="col-lg-8 shadow-lg p-5 rounded-3">
        <div class="row text-center mb-5">
            <div class="col-lg">
                <h1>Tambah User</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <form action="/dashboard/users" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="image" class="form-label">Masukkan Gambar</label>
                        <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                            id="image" autocomplete="off" autofocus>
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role Id</label>
                        <select class="form-select" name="role_id">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->nama }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" placeholder="Nama Produk" value="{{ old('nama') }}" autocomplete="off" required>
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="Username" value="{{ old('username') }}" autocomplete="off"
                            required>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off" required>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                            id="alamat" placeholder="Alamat" value="{{ old('alamat') }}" autocomplete="off" required>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">telp</label>
                        <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror"
                            id="telp" placeholder="telp" value="{{ old('telp') }}" autocomplete="off" required>
                        @error('telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" value="{{ old('password') }}" autocomplete="off" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-sm btn-success"
                        onclick="return confirm('Yakin ingin menambahkan user baru ?')">Add User</button>
                    <a href="/dashboard/users" class="btn btn-sm btn-danger"
                        onclick="return confirm('Yakin ingin kembali ? Data yang anda masukkan tidak akan tersimpan')">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    @endsection