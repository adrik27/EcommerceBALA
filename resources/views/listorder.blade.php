@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="invoiceList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">List Detail Order</h5>
                    {{-- <div class="flex-shrink-0">
                        <button class="btn btn-primary" onClick="deleteMultiple()"><i
                                class="ri-delete-bin-2-line"></i></button>
                        <a href="apps-invoices-create.html" class="btn btn-danger"><i
                                class="ri-add-line align-bottom me-1"></i> Create Invoizhce</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body bg-soft-light border border-dashed border-start-0 border-end-0">
                <form>
                    <div class="row g-3">
                        {{-- <div class="col-xxl-5 col-sm-12">
                            <div class="search-box">
                                <input type="text" class="form-control search bg-light border-light"
                                    placeholder="Search for customer, email, country, status or something...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div> --}}
                        <!--end col-->
                        {{-- <div class="col-xxl-3 col-sm-4">
                            <input type="text" class="form-control bg-light border-light" id="datepicker-range"
                                placeholder="Select date">
                        </div> --}}
                        <!--end col-->
                        {{-- <div class="col-xxl-3 col-sm-4">
                            <div class="input-light">
                                <select class="form-control" data-choices data-choices-search-false
                                    name="choices-single-default" id="idStatus">
                                    <option value="">Status</option>
                                    <option value="all" selected>All</option>
                                    <option value="Unpaid">Unpaid</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Cancel">Cancel</option>
                                    <option value="Refund">Refund</option>
                                </select>
                            </div>
                        </div> --}}
                        <!--end col-->

                        {{-- <div class="col-xxl-1 col-sm-4">
                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();">
                                <i class="ri-equalizer-fill me-1 align-bottom"></i> Filters
                            </button>
                        </div> --}}
                        <!--end col-->
                    </div>
                    <!--end row-->
                </form>
            </div>
            <div class="card-body">
                <div>
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="invoiceTable">
                            <thead class="text-muted">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th>
                                    <th class="sort text-uppercase" data-sort="invoice_id">Kode</th>
                                    <th class="sort text-uppercase" data-sort="customer_name">
                                        Produk</th>
                                    <th class="sort text-uppercase" data-sort="date">Tanggal</th>
                                    <th class="sort text-uppercase" data-sort="invoice_amount">
                                        Jumlah</th>
                                    <th class="sort text-uppercase" data-sort="status">Total</th>
                                    <th class="sort text-uppercase" data-sort="status">Status</th>
                                    <th class="sort text-uppercase" data-sort="action">Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($orderDet as $orderD)
                            <tbody class="list form-check-all" id="invoice-list-data">
                                <th>{{ $loop->iteration }}</th>
                                {{-- <th>{{ $orderD }}</th> --}}
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection