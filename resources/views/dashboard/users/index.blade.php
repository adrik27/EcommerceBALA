@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">User</h4>
            </div>
            <!-- end card header -->

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3 justify-content-between">
                        <div class="col-sm-auto">
                            <div>
                                <a href="/dashboard/users/create" class="btn btn-success add-btn"><i
                                        class="ri-add-line align-bottom me-1"></i>
                                    Add</a>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-auto">
                            <form action="/dashboard/users" method="get">
                                @csrf

                                <div class="input-group mb-3">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1"><i
                                            class="mdi mdi-magnify search-widget-icon"></i></button>
                                    <input type="text" name="searchUsers" class="form-control"
                                        placeholder="Masukkan Kata Kunci" autocomplete="off" autofocus>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="customer_name">No</th>
                                    <th class="sort" data-sort="customer_name">Nama</th>
                                    <th class="sort" data-sort="email">Email</th>
                                    <th class="sort" data-sort="phone">Telpon</th>
                                    <th class="sort" data-sort="action">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($users as $user)
                                <tr>
                                    <td class="phone">{{ $loop->iteration }}</td>
                                    <td class="date">{{ $user->nama }}</td>
                                    <td class="date">{{ $user->email }}</td>
                                    <td class="date">{{ $user->telp }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="/dashboard/users/{{ $user->id }}"
                                                class="btn btn-sm btn-info show-item-btn">Detail</a>
                                            <a href="/dashboard/users/{{ $user->id }}/edit"
                                                class="btn btn-sm btn-warning show-item-btn">edit</a>
                                            <form action="/dashboard/users/{{ $user->id }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger show-item-btn"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $user->nama }}')">Remove</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection