<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Italbolt</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            🍹 Italbolt
        </div>

        <div class="menu">
            <a href="/">Kezdőlap</a>
            <a href="/products">Termékek</a>
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

            <div class="kartya">
                <div class="ikon">🍺</div>
                <h3>Sörök</h3>
                <p>
                    Különböző sörök széles választéka.
                </p>
            </div>

            <div class="kartya">
                <div class="ikon">🍷</div>
                <h3>Borok</h3>
                <p>
                    Vörös-, fehér- és roséborok.
                </p>
            </div>

            <div class="kartya">
                <div class="ikon">🥃</div>
                <h3>Röviditalok</h3>
                <p>
                    Whisky, vodka, rum és egyéb italok.
                </p>
            </div>

            <div class="kartya">
                <div class="ikon">🍹</div>
                <h3>Koktélok</h3>
                <p>
                    Különleges italok és koktélalapanyagok.
                </p>
            </div>

        </div>

    </section>


    <footer>
        <p>Ács Vanda,Péter Botond</p>
    </footer>

</body>
</html>

