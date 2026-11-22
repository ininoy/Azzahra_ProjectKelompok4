<nav class="navbar navbar-expand-lg navbar-inno sticky-top">
    <div class="container">
        <!-- Logo Azzahra Shop -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
            <span class="brand-circle">AS</span>
            <span class="brand-text">Azzahra Shop</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#innoNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="innoNavbar">
            <!-- Menu Tengah -->
            <ul class="navbar-nav mx-auto align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link nav-link-inno" href="{{ url('/') }}">halaman depan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-inno" href="#kategori">busana wanita anak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-inno" href="#kategori">busana wanita dewasa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-inno" href="#kategori">hijab</a>
                </li>
            </ul>

            <!-- Ikon Kanan -->
            <div class="d-flex align-items-center gap-2">
                <button class="nav-icon-btn" title="Cari">
                    <i class="bi bi-search"></i>
                </button>

                <!-- Dropdown User (Tanpa Tulisan Panel Admin) -->
                <div class="dropdown dropdown-hover">
                    <button class="nav-icon-btn d-flex align-items-center gap-1">
                        <i class="bi bi-person"></i>
                        @auth
                            <span class="small fw-semibold" style="font-size: 13px;">{{ Auth::user()->name }}</span>
                        @endauth
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-inno text-center">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Masuk</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Daftar</a></li>
                        @else
                            @if(Auth::user()->role === 'admin')
                                <li><a class="dropdown-item fw-semibold text-primary" href="{{ url('/admin/dashboard') }}">Ke Halaman Admin</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Keluar</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>

                <!-- Wishlist -->
                <button class="nav-icon-btn" title="Favorit">
                    <i class="bi bi-heart"></i>
                    <span class="badge-pink">0</span>
                </button>

                <!-- Keranjang -->
                <button class="nav-icon-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartDrawer">
                    <i class="bi bi-cart3"></i>
                    <span class="badge-pink">0</span>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Drawer Keranjang Belanja Kanan -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartDrawer" style="width: 380px;">
    <div class="offcanvas-header border-bottom">
        <h6 class="offcanvas-title fw-semibold">keranjang belanja</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center text-center">
        <i class="bi bi-cart-x text-muted" style="font-size: 64px;"></i>
        <p class="text-muted small mt-3 mb-3">Keranjang belanja Anda kosong.</p>
        <button type="button" class="btn-pink-inno" data-bs-dismiss="offcanvas">Lanjutkan berbelanja</button>
    </div>
</div>
