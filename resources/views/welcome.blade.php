@extends('layouts.front.app')

@section('content')
<div class="container mt-3">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- 1. Hero Banner -->
    <section class="hero-inno">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Penawaran spesial terbatas untuk peluncuran produk baru</h1>
            <p class="hero-subtitle">
                Diskon hingga 50% untuk beberapa item pilihan — jangan sampai ketinggalan, atau Anda harus menunggu satu tahun lagi!
            </p>
            <a href="#katalog" class="btn btn-inno-purple">Beli sekarang!</a>
        </div>
        <div class="hero-dots">
            <span class="hero-dot active"></span>
            <span class="hero-dot"></span>
        </div>
    </section>

    <!-- 2. Produk yang direkomendasikan (Langsung dari Database Admin) -->
    <section id="katalog">
        <h2 class="section-title-inno">Produk yang direkomendasikan</h2>

        <div class="row g-4">
            @forelse($produks as $prod)
            <div class="col-6 col-md-3">
                <div class="product-item-inno">
                    <div class="product-img-wrap">
                        @if($prod->info_penjualan)
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2" style="z-index: 2;">
                                {{ $prod->info_penjualan }}
                            </span>
                        @endif

                        <button type="button" class="btn-fav-hover" onclick="tambahFavorit('{{ $prod->nama_produk }}', this)">
                            <i class="bi bi-heart me-1"></i> Tambahkan ke favorit
                        </button>

                        <img src="{{ $prod->gambar ? asset('storage/' . $prod->gambar) : 'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?auto=format&fit=crop&w=600&q=80' }}"
                             alt="{{ $prod->nama_produk }}">
                    </div>

                    <div class="product-name-inno" title="{{ $prod->nama_produk }}">{{ $prod->nama_produk }}</div>
                    <div class="small text-muted mb-1" style="font-size: 11px;">
                        Bahan: {{ $prod->bahan ?? '-' }} | Stok: {{ $prod->stok }}
                    </div>

                    <div>
                        @if($prod->harga_promo)
                            <span class="product-price-old">Rp {{ number_format($prod->harga, 0, ',', '.') }}</span>
                            <span class="product-price-now">Rp {{ number_format($prod->harga_promo, 0, ',', '.') }}</span>
                        @else
                            <span class="product-price-now">Rp {{ number_format($prod->harga, 0, ',', '.') }}</span>
                        @endif
                    </div>

                    @if($prod->stok > 0)
                        <a href="javascript:void(0)"
                           onclick="bukaModalBeli({{ $prod->id }}, '{{ addslashes($prod->nama_produk) }}', {{ $prod->harga_promo ?? $prod->harga }}, '{{ addslashes($prod->ukuran ?? '-') }}', '{{ addslashes($prod->bahan ?? '-') }}', '{{ addslashes($prod->deskripsi ?? '') }}')"
                           class="add-cart-hover">
                            Tambahkan ke keranjang
                        </a>
                    @else
                        <span class="text-muted small d-block mt-2">Stok Habis</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted">
                Koleksi busana terbaru akan segera hadir.
            </div>
            @endforelse
        </div>
    </section>

    <!-- 3. Kategori barang -->
    <section id="kategori">
        <h2 class="section-title-inno">Kategori barang</h2>
        <div class="row g-4 justify-content-center">
            @php
                $contohKategori = [
                    ['nama' => 'busana wanita anak', 'img' => 'https://images.unsplash.com/photo-1518831959646-742c3a14ebf7?auto=format&fit=crop&w=600&q=80'],
                    ['nama' => 'busana wanita dewasa', 'img' => 'https://images.unsplash.com/photo-1566174053879-31528523f8ae?auto=format&fit=crop&w=600&q=80'],
                    ['nama' => 'hijab', 'img' => 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?auto=format&fit=crop&w=600&q=80'],
                ];
            @endphp
            @foreach($contohKategori as $kat)
            <div class="col-12 col-md-4">
                <div class="product-item-inno">
                    <div class="product-img-wrap">
                        <img src="{{ $kat['img'] }}" alt="{{ $kat['nama'] }}">
                    </div>
                    <div class="product-name-inno fw-bold">{{ $kat['nama'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</div>

<!-- Modal Pembelian / Checkout Pelanggan -->
<div class="modal fade" id="modalBeli" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="beli_product_id">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="beli_nama_produk">Detail Busana</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="bg-light p-3 rounded mb-3 small">
                        <div><strong>Harga Satuan:</strong> <span class="text-danger fw-bold" id="beli_harga"></span></div>
                        <div><strong>Bahan:</strong> <span id="beli_bahan"></span> | <strong>Ukuran:</strong> <span id="beli_ukuran"></span></div>
                        <div class="mt-1 text-muted" id="beli_deskripsi"></div>
                    </div>

                    <div class="mb-2">
                        <label class="form-label small fw-semibold">Jumlah Beli</label>
                        <input type="number" name="jumlah" class="form-control" value="1" min="1" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-semibold">Nama Lengkap Pembeli</label>
                        <input type="text" name="nama_pembeli" class="form-control" value="{{ Auth::check() ? Auth::user()->name : '' }}" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-semibold">Nomor WhatsApp / HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label small fw-semibold">Alamat Pengiriman Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="2" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn-pink-inno">Konfirmasi Beli Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let jumlahFavorit = 0;

    function tambahFavorit(namaProduk, tombol) {
        jumlahFavorit++;
        const badges = document.querySelectorAll('.badge-pink');
        if (badges.length > 0) {
            badges[0].innerText = jumlahFavorit;
        }
        tombol.innerHTML = '<i class="bi bi-heart-fill text-danger me-1"></i> Difavoritkan';
    }

    function bukaModalBeli(id, nama, harga, ukuran, bahan, deskripsi) {
        document.getElementById('beli_product_id').value = id;
        document.getElementById('beli_nama_produk').innerText = nama;
        document.getElementById('beli_harga').innerText = 'Rp ' + harga.toLocaleString('id-ID');
        document.getElementById('beli_ukuran').innerText = ukuran || '-';
        document.getElementById('beli_bahan').innerText = bahan || '-';
        document.getElementById('beli_deskripsi').innerText = deskripsi || '';

        var myModal = new bootstrap.Modal(document.getElementById('modalBeli'));
        myModal.show();
    }
</script>
@endsection
