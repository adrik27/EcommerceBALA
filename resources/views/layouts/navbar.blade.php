<nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
    {{-- @dd($produk->Order_Detail[0]->id) --}}
    <div class="container">
        <a class="navbar-brand" href="/">
            <h4>BALA.COM</h4>
            {{-- <img src="/assets/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo dark" height="17">
            <img src="/assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
            --}}
        </a>
        <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>


        {{-- keranjang --}}

        <div class="d-flex align-items-center">
            @can('user')
            @if ($user = auth()->user())

            <div class="dropdown topbar-head-dropdown ms-1 header-item">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                    id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                    aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-shopping-bag fs-22'></i>
                    <span
                        class="position-absolute topbar-badge cartitem-badge fs-10 translate-middle badge rounded-pill bg-info">{{
                        count($keranjangs) }}</span>
                </button>

                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart"
                    aria-labelledby="page-header-cart-dropdown">
                    <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 fs-16 fw-semibold"> My Cart</h6>
                            </div>
                            <div class="col-auto">
                                <span class="badge badge-soft-warning fs-13">{{
                                    count($keranjangs) }}<span class="cartitem-badge"></span>
                                    items</span>
                            </div>
                        </div>
                    </div>
                    <form action="/beli" method="post">
                        @csrf
                        <div data-simplebar style="max-height: 300px;">
                            <div class="p-2">
                                @if (empty($keranjangs))
                                <div class="text-center empty-cart" id="empty-cart">
                                    <div class="avatar-md mx-auto my-3">
                                        <div class="avatar-title bg-soft-info text-info fs-36 rounded-circle">
                                            <i class='bx bx-cart'></i>
                                        </div>
                                    </div>
                                    <h5 class="mb-3">Your Cart is Empty!</h5>
                                    <a href="#" class="btn btn-success w-md mb-3">Shop Now</a>
                                </div>
                                @else
                                @foreach ($keranjangs as $keranjang)
                                <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/'.$keranjang->produk->image) }}"
                                            class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="mt-0 mb-1 fs-14">
                                                <a href="apps-ecommerce-product-details.html" class="text-reset"> {{
                                                    $keranjang->produk->nama }} </a>
                                            </h6>
                                            <p class="mb-0 fs-12 text-muted">
                                                Quantity: <span>10 x $32</span>
                                            </p>
                                        </div>
                                        <input type="hidden" name="produk[]" value="{{ $keranjang->produk_id }}">
                                        <div class="px-2">
                                            <h5 class="m-0 fw-normal"><span
                                                    class="cart-item-price">@currency($keranjang->produk->harga)</span>
                                            </h5>
                                        </div>
                                        <div class="ps-2">
                                            <button type="button"
                                                class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i
                                                    class="ri-close-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                @endif

                            </div>
                        </div>
                        <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border"
                            id="checkout-elem">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <h5 class="m-0 text-muted">Total:</h5>
                                <div class="px-2">
                                    <h5 class="m-0" id="cart-item-total">
                                        @currency($keranjangs->sum(function ($keranjang) {
                                        return $keranjang->produk['harga'];
                                        }))
                                    </h5>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success text-center w-100">
                                Checkout
                            </button>

                        </div>
                </div>
                </form>
            </div>
            {{-- welcome user --}}
            <div class="dropdown ms-sm-3 header-item topbar-user bg-transparent">
                <button type="button" class="btn btn-primary" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        <span class="d-none d-xl-inline-block ms-1 fw-bold user-name-text">Welcome, {{
                            strtoupper(auth()->user()->nama) }}</span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <h6 class="dropdown-header">Welcome {{ strtoupper(auth()->user()->nama) }}</h6>
                    <a class="dropdown-item" href="#"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">Profile</span></a>
                    <a class="dropdown-item" href="/listorder"><i
                            class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                            class="align-middle">List Order</span></a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i><span class="align-middle"
                                data-key="t-logout">Logout</span></button>
                    </form>
                </div>
            </div>
            @endif
            @else
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0" id="navbar-example">
                    <a href="/login" class="btn btn-link fw-medium text-decoration-none text-dark">Log
                        In</a>
                    <a href="/registrasi" class="btn btn-primary">Sign Up</a>
                </ul>
            </div>
            @endcan
        </div>
</nav>
<!-- end navbar -->