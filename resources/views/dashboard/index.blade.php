@extends('dashboard.layouts.main')

@section('container')
<div class="row mt-5 text-center">
    <div class="col-lg">
        <h1>Welcome Back in Dashboard, <span class="text-info fw-bold"> {{ Strtoupper(auth()->user()->nama) }} </span>
        </h1>
    </div>
</div>
@endsection