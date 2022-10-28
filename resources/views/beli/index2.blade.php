@extends('layouts.main')

@section('container')
<div class="container">
    <!-- start page title -->

    <div class="row">
        <div class="col-xl">
            <form action="/orderKeranjang" method="post">
                @csrf
                <input type="hidden" value="" name="id">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Order </h5>
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
                                    <?php $total_harga = 0 ?>
                                    @foreach ($Produks as $produk)
                                    <tr>
                                        <input type="hidden" name="id_produk[]" value="{{ $produk->id }}">
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img src="{{ asset('storage/'. $produk->image) }}" alt=""
                                                        class="img-fluid d-block">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="fs-15"><a href="/" class="link-primary">
                                                </a>{{ $produk->nama }}</h5>
                                        </td>
                                        <td>
                                            <input type="hidden" value="" name="harga">@currency($produk->harga)
                                        </td>
                                        <td>

                                            <input type="number" class="form-control" name="jumlah[]" value="1"
                                                readonly>
                                        </td>
                                        <td class="fw-medium text-end">
                                            @currency($produk->harga)
                                        </td>
                                    </tr>
                                    <?php $total_harga += $produk->harga ?>
                                    @endforeach
                                    <tr class="border-top border-top-dashed">
                                        <td colspan="4"></td>
                                        <td colspan="3" class="fw-medium p-0">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr class="border-top border-top-dashed">
                                                        <th scope="row">Total :</th>
                                                        <th class="text-end">
                                                            @currency( $total_harga )
                                                        </th>
                                                        <input type="hidden" name="total_iki"
                                                            value="{{ $total_harga }}">
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
            <a href="" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
    </form>

</div><!-- container-fluid -->
@endsection