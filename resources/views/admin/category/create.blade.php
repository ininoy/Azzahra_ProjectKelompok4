@extends('layouts.admin.app')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h3>Tambah Kategori</h3>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
                    @error('nama_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ikon" class="form-label">Ikon (Emoji atau Class Icon, opsional)</label>
                    <input type="text" class="form-control" id="ikon" name="ikon" value="{{ old('ikon') }}" placeholder="Contoh: 📱 atau fas fa-laptop">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
