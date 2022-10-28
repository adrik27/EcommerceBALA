@extends('registrasi.layouts.main')

@section('registrasi')
<!-- auth page content -->
<div class="auth-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-sm-5 mb-4 text-white">
                    <p class="mt-3 fs-20 fw-medium">SELAMAT DATANG</p>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Form Registrasi</h5>
                        </div>
                        <div class="p-2 mt-4">
                            <form class="needs-validation" novalidate action="/registrasi" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Enter nama Full" required autocomplete="off" autofocus
                                        value="{{ old('nama') }}">
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">image</label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror" id="image"
                                        placeholder="Enter image" autocomplete="off">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror" id="username"
                                        placeholder="Enter Username" required autocomplete="off"
                                        value="{{ old('username') }}">
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Enter Email Address" required autocomplete="off"
                                        value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        placeholder="Enter Alamat Lengkap" required autocomplete="off"
                                        value="{{ old('alamat') }}">
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="telp" class="form-label">Telpon <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="telp"
                                        class="form-control @error('telp') is-invalid @enderror" id="telp"
                                        placeholder="Enter No Telpon" required autocomplete="off"
                                        value="{{ old('telp') }}">
                                    @error('telp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-2">
                                    <label for="password" class="form-label">Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="Enter password" required autocomplete="off">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">Registrasi</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="mt-4 text-center">
                    <p class="mb-0">Sudah Punya Akun ? <a href="/login"
                            class="fw-semibold text-primary text-decoration-underline"> Login </a> </p>
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end auth page content -->
@endsection