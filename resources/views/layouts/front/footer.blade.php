<footer id="tentang" class="border-top py-5 mt-5 bg-white text-muted">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <a href="{{ route('home') }}">
                        <span class="brand-circle">AS</span>
                        <span class="brand-text">Azzahra Shop</span>
                    </a>
                </div>
                <p class="small">Platform belanja fashion dan gaya hidup modern dengan koleksi pilihan terbaik.</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold text-dark mb-3">Kategori</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="#kategori" class="text-decoration-none text-muted">Pakaian wanita</a></li>
                    <li class="mb-2"><a href="#kategori" class="text-decoration-none text-muted">Pria</a></li>
                    <li class="mb-2"><a href="#kategori" class="text-decoration-none text-muted">Sepatu dan Tas</a></li>
                    <li><a href="#kategori" class="text-decoration-none text-muted">Perhiasan dan aksesoris</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold text-dark mb-3">Layanan</h6>
                <ul class="list-unstyled small">
                    <li class="mb-2"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted">Masuk / Daftar</a></li>
                    <li class="mb-2"><a href="{{ url('/admin/dashboard') }}" class="text-decoration-none text-muted">Kelola Produk (Admin)</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center small border-top pt-4 mt-4">
            © 2026 Azzahra Shop Laravel Project. All rights reserved.
        </div>
    </div>
</footer>
