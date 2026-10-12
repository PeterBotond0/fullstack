@extends('layouts.app')

@section('content')
<div class="kategoria-oldal">

    <div class="kategoria-fejlec">
        <h1>Kategóriák</h1>
        <p>Az italbolt kategóriái</p>
    </div>

    <div class="kategoria-tartalom">

        <form action="{{ route('alcohols.index') }}" method="GET" class="row g-3 align-items-end mb-4">
            <div class="col-md-8">
                <label for="search" class="form-label">Keresés név szerint</label>
                <input type="search" id="search" name="search" value="{{ $search }}" maxlength="255" class="form-control" placeholder="Keresett kategória neve">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Keresés</button>
                <a href="{{ route('alcohols.index') }}" class="btn btn-outline-secondary">Szűrés törlése</a>
            </div>
        </form>
        @if(session('success') || session('status'))
            <div class="alert alert-success" role="status">{{ session('success') ?? session('status') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif

        <a href="{{ route('alcohols.create') }}" class="btn uj-kategoria-gomb">
            + Új kategória
        </a>

        <div class="kategoria-lista">

            @forelse($alcohols as $alcohol)

                <div class="kategoria-kartya">

                    <div class="kategoria-ikon">
                        💡
                    </div>

                    <h2><a class="category-link" href="{{ route('products.index', ['alcohol_id' => $alcohol->id]) }}">{{ $alcohol->name }}</a></h2>

                    <div class="kategoria-gombok">

                        <a href="{{ route('alcohols.edit', $alcohol->id) }}"
                           class="btn szerkesztes-gomb">
                            Szerkesztés
                        </a>

                        <form action="{{ route('alcohols.destroy', $alcohol->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn torles-gomb">
                                Törlés
                            </button>

                        </form>

                        <a href="{{ route('products.index', ['alcohol_id' => $alcohol->id]) }}"
                           class="btn termekek-gomb"
                           aria-label="{{ $alcohol->name }} kategória termékeinek megtekintése">
                            Termékek
                        </a>

                    </div>

                </div>

            @empty
                <p class="alert alert-info w-100 text-center">Nincs a keresésnek megfelelő kategória.</p>
            @endforelse

        </div>

    </div>

</div>

@endsection