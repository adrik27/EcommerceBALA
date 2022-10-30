@extends('layouts.main')

@section('container')

<div class="row d-flex justify-content-center">
    <div class="col-6">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            {{-- <a href="/detailPesanan/{{ session('link') }}">Lihat Detail Pesanan</a> --}}
            <a href="/detailpesanansemua">Lihat Detail Pesanan Semua</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif
    </div>
</div>
<div class="d-flex row mt-5  justify-content-evenly">
    @foreach ($produks as $pr)
    <div class="col-md-3 align-self-center">
        <div class="card" style="height: 450px;">
            <img src="{{ asset('storage/'. $pr->image) }}" class="card-img-top" alt="..." width="50px" height="200px">
            <h5 class="card-title my-2 text-center">{{ $pr->nama }}</h5>
            <h2 class="card-title mx-2 mt-2 mb-0"> Deskripsi :</h2>
            <div class="card-body overflow-auto">
                <p class="card-text">{!! $pr->keterangan !!}</p>
            </div>
            <a class="btn btn-sm btn-success my-2">@currency( $pr->harga )</a>
            <a href="/{{ $pr->id }}" class="btn btn-sm btn-info my-2 mx-5">Detail</a>
        </div>
    </div>
    @endforeach
</div>
@endsection