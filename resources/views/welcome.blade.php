<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Italbolt</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="navbar navbar-expand flex-wrap gap-3">

        <div class="logo">
            🍹 Italbolt
        </div>

        <div class="menu">
            <a href="/">Kezdőlap</a>
            <a href="/alcohols">Kategóriák</a>
        </div>

    </nav>


    <section class="hero">

        <h1>Üdvözlünk az Italboltban! 🍾</h1>

        <p>
            Fedezd fel alkoholos italaink és termékeink
            széles választékát egy helyen.
        </p>

        <a href="/products" class="gomb">
            🛒 Termékek megtekintése
        </a>

    </section>


    <section class="termekek">

        <h2>🍸 Kínálatunk</h2>

        <div class="kartya-container">

            <a class="kartya card text-decoration-none" href="{{ route('products.index', ['category' => 'beer']) }}">
                <div class="ikon">🍺</div>
                <h3>Sörök</h3>
                <p>
                    Különböző sörök széles választéka.
                </p>
            </a>

            <a class="kartya card text-decoration-none" href="{{ route('products.index', ['category' => 'wine']) }}">
                <div class="ikon">🍷</div>
                <h3>Borok</h3>
                <p>
                    Vörös-, fehér- és roséborok.
                </p>
            </a>

            <a class="kartya card text-decoration-none" href="{{ route('products.index', ['category' => 'spirits']) }}">
                <div class="ikon">🥃</div>
                <h3>Röviditalok</h3>
                <p>
                    Whisky, vodka, rum és egyéb italok.
                </p>
            </a>

            <a class="kartya card text-decoration-none" href="{{ route('products.index', ['category' => 'cocktails']) }}">
                <div class="ikon">🍹</div>
                <h3>Koktélok</h3>
                <p>
                    Különleges italok és koktélalapanyagok.
                </p>
            </a>

        </div>

    </section>


    <footer>
        <p>Ács Vanda,Péter Botond</p>
    </footer>

</body>
</html>

