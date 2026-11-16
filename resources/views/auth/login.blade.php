<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Azzahra Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', sans-serif; }
        .login-card { max-width: 400px; margin: 80px auto; border: none; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.06); }
        .brand-circle { width: 38px; height: 38px; background: linear-gradient(135deg, #8b5cf6, #6d28d9); color: #fff; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 700; font-style: italic; }
        .btn-inno { background-color: #e91e63; color: #fff; font-weight: 600; }
        .btn-inno:hover { background-color: #d81b60; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card login-card p-4 bg-white">
            <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center gap-2 mb-2">
                    <span class="brand-circle">AS</span>
                    <span class="fw-bold fs-4">Azzahra Shop</span>
                </div>
                <p class="text-muted small">Silakan masuk ke akun Anda</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger small py-2">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-inno w-100 py-2 mb-3">Masuk</button>
            </form>

            <div class="text-center small">
                Belum punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-semibold" style="color: #e91e63;">Daftar sekarang</a>
                <div class="mt-2"><a href="{{ url('/') }}" class="text-muted text-decoration-none">← Kembali ke Toko</a></div>
            </div>
        </div>
    </div>
</body>
</html>
