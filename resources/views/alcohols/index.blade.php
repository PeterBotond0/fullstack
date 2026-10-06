@extends('layouts.app')

@section('content')
<div class="kategoria-oldal">

    <div class="kategoria-fejlec">
        <h1>Kategóriák</h1>
        <p>Az italbolt kategóriái</p>
    </div>

    <div class="kategoria-tartalom">

        <a href="{{ route('alcohols.create') }}" class="uj-kategoria-gomb">
            + Új kategória
        </a>

        <div class="kategoria-lista">

            @foreach($alcohols as $alcohol)

                <div class="kategoria-kartya">

                    <div class="kategoria-ikon">
                        💡
                    </div>

                    <h2>{{ $alcohol->name }}</h2>

                    <div class="kategoria-gombok">

                        <a href="{{ route('alcohols.edit', $alcohol->id) }}"
                           class="szerkesztes-gomb">
                            Szerkesztés
                        </a>

                        <form action="{{ route('alcohols.destroy', $alcohol->id) }}"
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