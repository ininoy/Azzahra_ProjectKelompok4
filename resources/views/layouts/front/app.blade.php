<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InnoShop - Toko Online</title>
    @include('layouts.front.css')
</head>
<body>

    @include('layouts.front.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.front.footer')
    @include('layouts.front.js')

</body>
</html>
