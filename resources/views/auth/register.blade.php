@extends('layouts.auth.app')

@section('title', 'Daftar Akun - Azzahra Shop')

@section('content')
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label small fw-semibold">Nama Lengkap</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label small fw-semibold">Password (minimal 6 karakter)</label>
            <div class="position-relative">
                <input type="password" name="password" id="password"
                    class="form-control pe-5 no-icon-validation @error('password') is-invalid @enderror">

                <i class="bi bi-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3 text-muted"
                    style="cursor: pointer; z-index: 10;" data-target="#password"></i>
            </div>
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="form-label small fw-semibold">Konfirmasi Password</label>
            <div class="position-relative">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control pe-5 no-icon-validation">

                <i class="bi bi-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3 text-muted"
                    style="cursor: pointer; z-index: 10;" data-target="#password_confirmation"></i>
            </div>
        </div>
        <button type="submit" class="btn btn-inno w-100 py-2 mb-3">Daftar</button>
    </form>

    <div class="text-center small">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-semibold"
            style="color: #e91e63;">Masuk di sini</a>
        <div class="mt-2"><a href="{{ url('/') }}" class="text-muted text-decoration-none">← Kembali ke Toko</a>
        </div>
    </div>
@endsection
