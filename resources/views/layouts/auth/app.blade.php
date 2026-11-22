<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Start Title --}}
    <title>@yield('title', 'Azzahra Shop')</title>
    {{-- End Title --}}

    {{-- Start CSS --}}
    @include('layouts.auth.css')
    {{-- End CSS --}}
</head>

{{-- Start Body --}}
<body>
    <div class="container">
        <div class="card login-card p-4 bg-white">
            <div class="text-center mb-4">
                <div class="d-inline-flex align-items-center gap-2 mb-2">
                    {{-- Start Title Card --}}
                    @include('layouts.auth.title')
                    {{-- End Title Card --}}
                </div>
                <p class="text-muted small">Daftar akun pelanggan baru</p>
            </div>

            {{-- Start Main Content --}}
            <main>
                @yield('content')
            </main>
            {{-- End Main Content --}}
        </div>
    </div>

    {{-- Start JS --}}
    @include('layouts.auth.js')
    {{-- End JS --}}

</body>
{{-- End Body --}}
</html>
