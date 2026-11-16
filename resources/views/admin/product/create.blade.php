@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Tambah Katalog Busana</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Kategori Busana</label>
                        <select class="form-select" name="category_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nama Busana</label>
                        <input type="text" class="form-control" name="nama_produk" placeholder="Contoh: Gamis Syari Ceruty Premium" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Harga Normal (Rp)</label>
                        <input type="number" class="form-control" name="harga" placeholder="250000" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Harga Promo/Diskon (Opsional)</label>
                        <input type="number" class="form-control" name="harga_promo" placeholder="199000">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Stok Tersedia (pcs)</label>
                        <input type="number" class="form-control" name="stok" value="10" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Bahan / Material</label>
                        <input type="text" class="form-control" name="bahan" placeholder="Contoh: Katun Toyobo / Voal">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Pilihan Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" placeholder="Contoh: S, M, L, XL / All Size">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Label Info Penjualan (Opsional)</label>
                        <input type="text" class="form-control" name="info_penjualan" placeholder="Contoh: Terlaris / Diskon 50%">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-semibold">Deskripsi & Detail Busana</label>
                        <textarea class="form-control" name="deskripsi" rows="3" placeholder="Tuliskan detail panjang baju, lingkar dada, cara perawatan, dll."></textarea>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label fw-semibold">Foto Busana</label>
                        <input type="file" class="form-control" name="gambar" accept="image/*" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary px-4">Simpan & Tampilkan di Toko</button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
