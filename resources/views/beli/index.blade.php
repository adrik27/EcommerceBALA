@extends('layouts.main')

@section('container')
<div class="container">

    <!-- start page title -->

    <div class="row">
        <div class="col-xl">
            <form action="/order" method="post">
                @csrf
                <input type="hidden" value="{{ $Produk->id }}" name="id">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Order {{ $Produk->kode }}</h5>
                            <div class="flex-shrink-0">
                                <a href="apps-invoices-details.html" class="btn btn-success btn-sm"><i
                                        class="ri-download-2-fill align-middle me-1"></i> Invoice</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col" class="text-end">Total </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img src="{{ asset('storage/'.$Produk->image) }}" alt=""
                                                        class="img-fluid d-block">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="fs-15"><a href="/{{ $Produk->id }}" class="link-primary">{{
                                                    $Produk->nama }}</a></h5>
                                        </td>
                                        <td>
                                            <input type="hidden" value="{{ $Produk->harga }}" name="harga">
                                            @currency($Produk->harga)
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="jumlah" value="1" readonly>
                                        </td>
                                        <td class="fw-medium text-end">
                                            @currency($Produk->harga)
                                        </td>
                                    </tr>
                                    <tr class="border-top border-top-dashed">
                                        <td colspan="3"></td>
                                        <td colspan="2" class="fw-medium p-0">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr class="border-top border-top-dashed">
                                                        <th scope="row">Total :</th>
                                                        <th class="text-end">@currency($Produk->harga)</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <div class="row d-block text-center">
        <div class="col ">
            <button type="submit" class="btn btn-sm btn-primary">Konfirmasi</button>
            <a href="/{{ $Produk->id }}" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
    </form>

</div><!-- container-fluid -->
@endsection