<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="/dashboard">
            <h4 class="mt-3 mb-0 text-white">BALA.COM</h4>
        </a>
        {{-- <a href="/dashboard" class="logo logo-dark"> --}}
            {{-- <span class="logo-sm">
                <h4 class="text-white">BALA.COM</h4>
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/assets/images/logo-light.png" alt="" height="17">
            </span> --}}
            {{-- </a> --}}
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('dashboard')?'active':'' }}" href="/dashboard">
                        <i class="ri-home-8-line"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('dashboard/produks*')?'active':'' }}"
                        href="/dashboard/produks">
                        <i class="ri-archive-fill"></i> <span data-key="t-widgets">Produk</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('dashboard/listorder*')?'active':'' }}"
                        href="/dashboard/listorder">
                        <i class="ri-bar-chart-grouped-line"></i> <span data-key="t-widgets">List Order</span>
                    </a>
                </li>
                <li class="menu-title"><span data-key="t-menu">User</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Request::is('dashboard/users*')?'active':'' }}"
                        href="/dashboard/users">
                        <i class="mdi mdi-account-box-multiple"></i> <span data-key="t-widgets">User</span>
                    </a>
                </li>
                <!-- end Dashboard Menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>