@extends('dashboard.layouts.main')

@section('container')

<div class="row justify-content-center my-4">
    <div class="col-lg-8 shadow-lg p-5 rounded-3">
        <div class="row text-center mb-5">
            <div class="col-lg">
                <h1>Edit User</h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg d-block text-center">
                @if ($user->image)
                <img src="{{ asset('storage/'. $user->image) }}" alt="" class="img-fluid rounded-circle" width="100px">
                @else
                <img class="img-fluid rounded-circle" width="100px" src="/image/avatardefault.png" alt="Header Avatar">
                @endif
            </div>
        </div>
        <form action="/dashboard/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="image" class="form-label">Masukkan Gambar</label>
                <input class="form-control @error('imageprodukOld') is-invalid @enderror" name="imageprodukOld"
                    type="hidden">
                <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image"
                    autocomplete="off" autofocus>
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role_id" class="form-label">Role Id</label>
                <select class="form-select" id="role_id" name="role_id">
                    @foreach ($roles as $role)
                    <option value="{{ old('role_id', $role->id) }}">{{ $role->nama }}</option>
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
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    placeholder="Nama Produk" value="{{ old('nama',$user->nama) }}" autocomplete="off">
                @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    id="username" placeholder="Username" value="{{ old('username',$user->username) }}"
                    autocomplete="off">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    placeholder="Email" value="{{ old('email',$user->email) }}" autocomplete="off">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    placeholder="Alamat" value="{{ old('alamat', $user->alamat) }}" autocomplete="off">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telp" class="form-label">telp</label>
                <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror" id="telp"
                    placeholder="telp" value="{{ old('telp', $user->telp) }}" autocomplete="off">
                @error('telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-sm btn-success"
                onclick="return confirm('Yakin ingin mengupdate produk ?')">Update User</button>
            <a href="/dashboard/users" class="btn btn-sm btn-danger"
                onclick="return confirm('Yakin ingin kembali ? Data yang anda masukkan tidak akan tersimpan')">Kembali</a>
        </form>
    </div>
</div>
@endsection