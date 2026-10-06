<!doctype html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'LaravelApp') }}</title>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar">

        <div class="logo">
            🍹 Italbolt
        </div>

        <div class="menu">
            <a href="/">Kezdőlap</a>
            <a href="/alcohols">Kategóriák</a>
            <a href="/products">Termékek</a>
        </div>

    </nav>

    <main>
        @yield('content')
    </main>
    <footer>
        Ács Vanda,Péter Botond
    </footer>
</body>
</html>