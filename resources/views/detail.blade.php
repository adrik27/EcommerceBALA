@extends('layouts.main')

@section('container')
<!-- start page title -->
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row text-center justify-content-center">
                    <div class="col-8">
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row gx-lg-5 ">
                    <div class="col-xl-4 col-md-8 mx-auto align-self-center">
                        <img src="{{ asset('storage/'. $produk->image) }}" alt="" class="img-fluid">
                    </div>
                    <!-- end col -->

                    <div class="col-xl-8">
                        <div class="mt-xl-0 mt-5">
                            <div class="d-flex">
                                <div class="flex-grow-1 text-center">
                                    <h4>{{ strtoupper($produk->nama) }}</h4>
                                </div>
                                <div class="flex-shrink-0">
                                    <div>
                                        <a href="/" class="btn btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Kembali"
                                            onclick="return confirm('Yakin ingin kembali ?')"><i
                                                class="ri-reply-fill align-bottom"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row">
                                <div class="col-2">
                                    <label for="kode" class="label">Kode</label>
                                </div>
                                <div class="col-6">
                                    : <button class="btn btn-sm btn-outline-info" id="kode">
                                        {{ $produk->kode }}
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="harga" class="label">Harga</label>
                                </div>
                                <div class="col-6">
                                    : <button class="btn btn-sm btn-outline-success" id="harga">
                                        @currency( $produk->harga )
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mt-4">
                                        <h5 class="fs-14">Description </h5>
                                        <p>{!! $produk->keterangan !!}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- jika user sudah login --}}
                            @auth
                            {{-- tampilkan ini --}}
                            <div class="row">
                                <div class="col d-flex justify-content-center mb-2">
                                    <a href="/beli/{{ $produk->id }}" class="btn btn-sm btn-success">Beli</a>
                                    <form action="/keranjang/{{ $produk->id }}" method="post">
                                        @csrf
                                        <input type="hidden" name="{{ $produk->id }}">
                                        <button type="submit"
                                            class="btn btn-sm d-flex btn-primary ms-1">Keranjang</button>
                                    </form>
                                </div>
                            </div>
                            @else
                            {{-- jika belum login, tampilankan ini --}}
                            <div class="row d-flex text-center">
                                <div class="col mb-2">
                                    <a href="/login" class="btn btn-sm btn-success">Beli</a>
                                    <a href="/login" class="btn btn-sm btn-primary">Keranjang</a>
                                </div>
                            </div>
                            @endauth
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection