@extends('layouts.main')

@section('container')
<div class="container">
    {{-- @dd($orders->Order_Detail) --}}
    <div class="row mb-1 d-block text-center">
        <div class="col">
            <button class="btn btn-success">Pesanan Tanggal {{ $orders->tanggal }}</button>
        </div>
    </div>
    <div class="row mb-1 d-block text-center">
        <div class="col">
            <button class="btn  btn-info">Total @currency($orders->total)</button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @foreach ($orders->Order_Detail as $ord)

            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row ">
                        <label for="Produk" class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="Produk"
                                value="{{ $ord->Produk->nama }}">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="{{ $ord->jumlah }}">
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection