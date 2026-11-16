@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Edit Katalog Busana</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Kategori Busana</label>
                        <select class="form-select" name="category_id" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nama Busana</label>
                        <input type="text" class="form-control" name="nama_produk" value="{{ $product->nama_produk }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Harga Normal (Rp)</label>
                        <input type="number" class="form-control" name="harga" value="{{ $product->harga }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Harga Promo/Diskon</label>
                        <input type="number" class="form-control" name="harga_promo" value="{{ $product->harga_promo }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Stok Tersedia (pcs)</label>
                        <input type="number" class="form-control" name="stok" value="{{ $product->stok }}" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Bahan / Material</label>
                        <input type="text" class="form-control" name="bahan" value="{{ $product->bahan }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Pilihan Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" value="{{ $product->ukuran }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Label Info Penjualan</label>
                        <input type="text" class="form-control" name="info_penjualan" value="{{ $product->info_penjualan }}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-semibold">Deskripsi & Detail Busana</label>
                        <textarea class="form-control" name="deskripsi" rows="3">{{ $product->deskripsi }}</textarea>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="form-label fw-semibold">Foto Busana (Kosongkan jika tidak diganti)</label>
                        @if($product->gambar)
                            <div class="mb-2"><img src="{{ asset('storage/' . $product->gambar) }}" width="80" class="rounded"></div>
                        @endif
                        <input type="file" class="form-control" name="gambar" accept="image/*">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary px-4">Update Busana</button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
