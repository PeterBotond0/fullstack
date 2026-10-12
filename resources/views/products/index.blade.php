@extends('layouts.app')

@section('content')

<div class="termek-oldal">

    <div class="termek-fejlec">
        <h1>Termékek</h1>
        <p>Az italbolt termékei</p>
    </div>

    <div class="termek-tartalom">

        <form action="{{ route('products.index') }}" method="GET" class="row g-3 align-items-end mb-4">
            <div class="col-md-5">
                <label for="search" class="form-label">Keresés név szerint</label>
                <input type="search" id="search" name="search" value="{{ $search }}" maxlength="255" class="form-control" placeholder="Keresett termék neve">
            </div>
            <div class="col-md-4">
                <label for="alcohol_id" class="form-label">Kategória (szülő)</label>
                <select id="alcohol_id" name="alcohol_id" class="form-select" onchange="const group = this.form.querySelector('[name=category]'); if (group) group.disabled = true;">
                    @if($category && !$alcoholId)
                        <option value="" selected>{{ $groupLabels[$category] }}</option>
                    @endif
                    <option value="">Összes kategória</option>
                    @foreach($alcohols as $alcohol)
                        <option value="{{ $alcohol->id }}" @selected($alcoholId == $alcohol->id)>{{ $alcohol->name }}</option>
                    @endforeach
                </select>
            </div>
            @if($category && !$alcoholId)
                <input type="hidden" name="category" value="{{ $category }}">
            @endif
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Keresés</button>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Szűrés törlése</a>
            </div>
        </form>
        @if(session('success') || session('status'))
            <div class="alert alert-success" role="status">{{ session('success') ?? session('status') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif
        @if($category && !$alcoholId)
            <p class="alert alert-info">Kínálat: {{ $groupLabels[$category] }}</p>
        @endif

        <a href="{{ route('products.create') }}" class="btn uj-termek-gomb">
            + Új termék
        </a>

        <div class="termek-lista">

            @forelse($products as $product)

                <div class="termek-kartya">

                    <div class="termek-ikon">
                        📦
                    </div>

                    <h2>{{ $product->name }}</h2>

                    <div class="termek-gombok">

                        <a href="{{ route('products.edit', $product->id) }}"
                           class="btn szerkesztes-gomb">
                            Szerkesztés
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn torles-gomb">
                                Törlés
                            </button>

                        </form>

                    </div>

                </div>

            @empty
                <p class="alert alert-info w-100 text-center">Nincs a keresésnek megfelelő termék.</p>
            @endforelse

        </div>

    </div>

</div>

@endsection