@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Katalog Busana & Stok</h3>
        <a href="{{ route('product.create') }}" class="btn btn-primary">+ Tambah Busana Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Busana & Info</th>
                            <th>Kategori</th>
                            <th>Harga & Promo</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ $item->gambar ? asset('storage/' . $item->gambar) : 'https://placehold.co/60x80?text=No+Img' }}"
                                     width="55" height="70" style="object-fit: cover;" class="rounded">
                            </td>
                            <td>
                                <div class="fw-bold">{{ $item->nama_produk }}</div>
                                <small class="text-muted d-block">Bahan: {{ $item->bahan ?? '-' }} | Ukuran: {{ $item->ukuran ?? '-' }}</small>
                                @if($item->info_penjualan)
                                    <span class="badge bg-danger mt-1">{{ $item->info_penjualan }}</span>
                                @endif
                            </td>
                            <td>{{ $item->category->nama_kategori ?? '-' }}</td>
                            <td>
                                @if($item->harga_promo)
                                    <small class="text-muted text-decoration-line-through d-block">Rp {{ number_format($item->harga, 0, ',', '.') }}</small>
                                    <span class="text-danger fw-bold">Rp {{ number_format($item->harga_promo, 0, ',', '.') }}</span>
                                @else
                                    <span class="fw-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $item->stok > 0 ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->stok }} pcs
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus busana ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada katalog busana. Klik "+ Tambah Busana Baru" untuk mengisi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
