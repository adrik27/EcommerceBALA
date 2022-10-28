@extends('layouts.main')

@section('container')
{{-- @dd($order->Order_Detail[0]->Produk) --}}
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row ">
                        <label for="Produk" class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="Produk"
                                value="{{ $order->Order_Detail[0]->Produk->nama }}">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="{{ $order->Order_Detail[0]->jumlah }}">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Total</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="{{ $order->total }}">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="{{ $order->tanggal }}">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="{{ $order->Status->nama }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection