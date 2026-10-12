# Módosítások

- Kategória- és terméklistán név szerinti keresés, GET paraméterrel.
- Terméklistán kategória (szülő) szerinti szűrés; a keresés és a szűrés együtt használható.
- A kategórianevek és a Szerkesztés/Törlés melletti harmadik, „Termékek” gomb a hozzájuk tartozó termékekre vezetnek.
- A kezdőlap négy kínálati kártyája kattintható: Sörök, Borok, Röviditalok, Koktélok.
- A kezdőlapi csoportok a kategórianeveket használják. A Röviditalok csoportba Pálinka, Gin, Vodka, Whiskey/Whisky és Rum is tartozik. Koktélkategória vagy termék hiányában üres találati üzenet jelenik meg.
- Bootstrap 5.3.3 CSS CDN-ről töltődik, ezért internetkapcsolat szükséges. Az eredeti egyedi színek és CRUD műveletek megmaradtak.
- A Tailwind Vite plugin lekerült a buildből, így nem írja felül a Bootstrap stílusait.

## Ellenőrzés

A módosított forrás és Blade vezérlőszerkezetek ellenőrizve. Ebben a környezetben nincs PHP/Composer, ezért a Laravel futtatása és a funkcionális tesztek végrehajtása nem volt lehetséges.

A saját környezetben a szokásos telepítés után:

```sh
composer install
npm install
npm run build
php artisan test
```

Az új `ListingFilterTest` teszt ellenőrzi a keresést, a szülő szerinti szűrést, ezek kombinációját, a kategórialinkeket, a kezdőlapi csoportokat és az üres találatot.
