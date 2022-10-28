@extends('dashboard.layouts.main')

@section('container')
<div class="row">
    <div class="col">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg">
                <img src="/image/detailuser/bg-user.jpg" alt="" class="profile-wid-img" />
            </div>
        </div>
        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
            <div class="row g-4">
                <div class="col-auto">
                    <div class="avatar-lg">
                        @if (auth()->user()->image)
                        <img class="img-thumbnail rounded-circle" src="{{ asset('storage/'. auth()->user()->image) }}"
                            alt="Header Avatar">
                        @else
                        <img class="img-thumbnail rounded-circle" src="/image/avatardefault.png" alt="Header Avatar">
                        @endif
                    </div>
                </div>
                <!--end col-->
                <div class="col">
                    <div class="p-2">
                        <h3 class="text-white mb-1">{{ strtoupper($user->nama) }}</h3>
                        <div class="hstack text-white-50 gap-1">
                            <div class="me-2"><i
                                    class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{
                                strtoupper($user->alamat) }}</div>
                            <div><i class="ri-mail-line me-1 text-white-75 fs-16 align-middle"></i>{{
                                $user->email}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="d-flex justify-content-end">
                        <!-- Nav tabs -->
                        <div class="flex-shrink-0">
                            <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-success"><i
                                    class="ri-edit-box-line align-bottom"></i> Edit
                                Profile</a>
                            <a href="/dashboard/users" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin kembali ?')"><i
                                    class="ri-arrow-left-fill align-bottom"></i>
                                Kembali</a>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content pt-4 text-muted">
                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Info</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Nama Lengkap :</th>
                                                            <td class="text-muted">{{ strtoupper($user->nama)
                                                                }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Nama Role :</th>
                                                            <td class="text-muted">{{
                                                                strtoupper($user->Role->nama)
                                                                }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Username :</th>
                                                            <td class="text-muted">{{ $user->username }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">E-mail :</th>
                                                            <td class="text-muted">{{ $user->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Alamat :</th>
                                                            <td class="text-muted">{{ strtoupper($user->alamat)
                                                                }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Telpon :</th>
                                                            <td class="text-muted">(+62) {{ $user->telp
                                                                }}</td>
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
                        </div>
                        <!--end tab-pane-->
                    </div>
                    <!--end tab-content-->
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
@endsection

{{-- @extends('dashboard.layouts.main')

@section('container')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">User Details</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row gx-lg-5 ">
                    <div class="col-xl-4 col-md-8 mx-auto align-self-center">
                        @if ($user->image)
                        <img src="{{ asset('storage/'. $user->image) }}" alt="" class="img-fluid rounded-3">
                        @else
                        <img class="img-fluid rounded-3" src="/image/avatardefault.png" alt="Header Avatar">
                        @endif
                    </div>
                    <!-- end col -->

                    <div class="col-xl-8">
                        <div class="mt-xl-0 mt-5">
                            <div class="d-flex">
                                <div class="flex-grow-1 text-center">
                                    <h2>{{ strtoupper($user->nama) }}</h2>
                                </div>
                                <div class="flex-shrink-0">
                                    <div>
                                        <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-warning"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                class="ri-pencil-fill align-bottom"></i></a>
                                        <a href="/dashboard/users" class="btn btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Kembali"
                                            onclick="return confirm('Yakin ingin kembali ?')"><i
                                                class="ri-reply-fill align-bottom"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="mb-3">
                                <label for="role_id" class="form-label">Role</label>
                                <input type="text" class="form-control" id="role_id"
                                    value="{{ strtoupper($user->Role->nama) }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" value="{{ $user->username }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat"
                                    value="{{ strtoupper($user->alamat) }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="form-label">Telpon</label>
                                <input type="text" class="form-control" id="telp" value="{{ $user->telp }}" readonly>
                            </div>

                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection --}}