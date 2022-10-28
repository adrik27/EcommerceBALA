@extends('dashboard.layouts.main')

@section('container')

<div class="row justify-content-center my-4">
    <div class="col-lg-8 shadow-lg p-5 rounded-3">
        <div class="row text-center mb-5">
            <div class="col-lg">
                <h1>Tambah Produk</h1>
            </div>
        </div>
        <div class="col-lg">
            <form action="/dashboard/produks" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="image" class="form-label">Masukkan Gambar</label>
                    <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image"
                        autocomplete="off" autofocus required>
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode</label>
                    <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="kode"
                        placeholder="Kode" value="{{ old('kode') }}" autocomplete="off" required>
                    @error('kode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        placeholder="Nama Produk" value="{{ old('nama') }}" autocomplete="off" required>
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Produk</label>
                    <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="harga"
                        placeholder="Harga Produk" value="{{ old('harga') }}" autocomplete="off" required>
                    @error('hargaproduk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan Produk</label>
                    <input id="keterangan" class="@error('keterangan') is-invalid @enderror" type="hidden"
                        name="keterangan" value="{{ old('keterangan') }}" autocomplete="off" required>
                    <trix-editor input="keterangan"></trix-editor>
                    @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-sm btn-success"
                    onclick="return confirm('Yakin ingin menambahkan produk baru ?')">Add Produk</button>
                <a href="/dashboard/produks" class="btn btn-sm btn-danger"
                    onclick="return confirm('Yakin ingin kembali ? Data yang anda masukkan tidak akan tersimpan')">Kembali</a>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('trix-file-accept', function(e) {
                e.preventDefault();
            })
    </script>
    @endsection