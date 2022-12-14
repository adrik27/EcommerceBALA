@extends('layouts.main')

@section('container')
{{-- @dd($order) --}}
<div class="container">
    <div class="row mb-2 d-block text-center">
        <div class="col">
            <button class="btn btn-sm btn-success">Pesanan Tanggal: {{ $order->tanggal }}</button>
        </div>
    </div>
    <div class="row mb-2 d-block text-center">
        <div class="col">
            <button class="btn btn-sm btn-info">Total: {{ $order->total }}</button>
        </div>
    </div>
    <div class="row mb-2 d-block text-center">
        <div class="col">
            <button class="btn btn-sm btn-warning">Status: {{ $order->Status->nama }}</button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @foreach ($order->Order_Detail as $od)
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row ">
                        <label for="Produk" class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="Produk"
                                value="{{ $od->Produk->nama }}">
                        </div>
                        <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="{{ $od->jumlah }}">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row d-block text-center">
        <div class="col">
            @if ($order->Status->nama == 'kirim')
            <button class="btn btn-sm btn-success">Selesai</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="/pesanansaya" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
</div>
@endsection