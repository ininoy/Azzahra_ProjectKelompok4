<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">AZZAHRA SHOP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Katalog Toko -->
    <div class="sidebar-heading">
        Katalog Toko
    </div>

    <!-- Nav Item - Kategori -->
    <li class="nav-item {{ request()->routeIs('category.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Kategori</span>
        </a>
    </li>

    <!-- Nav Item - Produk -->
    <li class="nav-item {{ request()->routeIs('product.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('product.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Produk</span>
        </a>
    </li>

    <!-- Nav Item - Info Penjualan -->
    <li class="nav-item {{ request()->routeIs('order.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('order.index') }}">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Info Penjualan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading Manajemen Data -->
    <div class="sidebar-heading">
        Manajemen Data
    </div>

    <!-- Nav Item - Pelanggan -->
    <li class="nav-item {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pelanggan.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span>
        </a>
    </li>

    <!-- Nav Item - User -->
    <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Lihat Toko (Frontend) -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}" target="_blank">
            <i class="fas fa-fw fa-external-link-alt"></i>
            <span>Lihat Toko</span>
        </a>
    </li>

    <!-- Nav Item - Logout Admin -->
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" id="logout-admin-form">
            @csrf
            <a class="nav-link" href="javascript:void(0)" onclick="document.getElementById('logout-admin-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Keluar (Logout)</span>
            </a>
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
