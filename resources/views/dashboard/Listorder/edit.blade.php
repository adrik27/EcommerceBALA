@extends('dashboard.layouts.main')
@section('container')
<div class="row justify-content-center my-4">
    <div class="col-lg-8 shadow-lg p-5 rounded-3">
        <div class="row text-center mb-5">
            <div class="col-lg">
                <h1>Edit List Order</h1>
            </div>
        </div>
        <div class="col-lg">
            {{-- <div class="row mb-3">
                <div class="col-lg">
                    <img src="{{ asset('storage/'. $produk->image) }}" alt="" class="img-fluid rounded-3">
                </div>
            </div> --}}
            <form action="/dashboard/listorder/{{ $orders->id }}" method="post">
                @csrf
                <input type="hidden" value="{{ $orders->id }}" name="id">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                        id="tanggal" placeholder="Nama Pengguna" value="{{ old('tanggal', $orders->tanggal) }}"
                        autocomplete="off" required>
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                        id="user_id" placeholder="Nama Pengguna" value="{{ $orders->User->nama }}" autocomplete="off"
                        required>
                    @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Total</label>
                    <input type="text" name="total" class="form-control @error('total') is-invalid @enderror" id="total"
                        placeholder="Total" value="{{ old('total', $orders->total) }}" autocomplete="off" required>
                    @error('total')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status_id" class="form-label">Pilih Status</label>
                    <select class="form-select" id="status_id" name="status_id">
                        @foreach ($statuses as $status)
                        {{-- @if (old('status_id',$status->id) == $orders->status_id) --}}
                        <option value="{{ $status->id }}" @if ($status->id == $orders->status_id) selected @endif
                            @if($status->id == 3) disabled @endif>{{ $status->nama }}</option>
                        {{-- @else
                        <option value="{{ $status->id }}">{{ $status->nama }}</option>
                        @endif --}}
                        @endforeach
                    </select>
                </div>


                <button type="submit" class="btn btn-sm btn-success"
                    onclick="return confirm('Yakin ingin mengupdate Order ?')">Update Order</button>
                <a href="/dashboard/listorder" class="btn btn-sm btn-danger"
                    onclick="return confirm('Yakin ingin kembali ? Data yang anda masukkan tidak akan tersimpan')">Kembali</a>
            </form>
        </div>
    </div>
    @endsection