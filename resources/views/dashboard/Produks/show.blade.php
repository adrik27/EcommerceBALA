@extends('dashboard.layouts.main')

@section('container')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Product Details</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
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
                                        <a href="/dashboard/produks/{{ $produk->id }}/edit" class="btn btn-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                class="ri-pencil-fill align-bottom"></i></a>
                                        <a href="/dashboard/produks" class="btn btn-danger" data-bs-toggle="tooltip"
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
                                        Rp {{ $produk->harga }}
                                    </button>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col">
                                    <div class="mt-4">
                                        <h5 class="fs-14">Description </h5>
                                        <p>{!! $produk->keterangan !!}</p>
                                    </div>
                                </div>
                            </div>
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