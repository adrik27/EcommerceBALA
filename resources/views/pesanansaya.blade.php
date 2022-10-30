@extends('layouts.main')

@section('container')
@foreach ($pesanansaya as $ps)
<div class="card">
    <div class="card-body">
        <div class="mb-3 row ">
            <label for="Produk" class="col-3 col-form-label">Pesanan Pada Tanggal</label>
            <div class="col">
                <input type="text" class="form-control-plaintext" id="Produk" value="{{ $ps->tanggal }}">
            </div>
            <div class="col-1">
                <a href="/detailPesanan/{{ $ps->id }}" class="btn btn-sm btn-warning">Detail</a>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col">
            <button class="btn btn-sm btn-info"> {{ $ps->Status->nama }}</button>
        </div>
    </div>
</div>
@endforeach
@endsection