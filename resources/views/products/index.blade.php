@extends('layouts.app')

@section('content')

<div class="termek-oldal">

    <div class="termek-fejlec">
        <h1>Termékek</h1>
        <p>Az italbolt termékei</p>
    </div>

    <div class="termek-tartalom">

        <a href="{{ route('products.create') }}" class="uj-termek-gomb">
            + Új termék
        </a>

        <div class="termek-lista">

            @foreach($products as $product)

                <div class="termek-kartya">

                    <div class="termek-ikon">
                        📦
                    </div>

                    <h2>{{ $product->name }}</h2>

                    <div class="termek-gombok">

                        <a href="{{ route('products.edit', $product->id) }}"
                           class="szerkesztes-gomb">
                            Szerkesztés
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="torles-gomb">
                                Törlés
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection