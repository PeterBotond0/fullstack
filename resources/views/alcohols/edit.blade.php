@extends('layouts.app')

@section('title', __('Kategória módosítása'))

@section('content')

<div class="kategoria-form-oldal">

    <div class="kategoria-form-fejlec">
        <h1>Kategória módosítása</h1>
        <p>Módosítsd a kiválasztott kategória nevét</p>
    </div>

    <div class="kategoria-form-kartya">

        <form action="{{ route('alcohols.update', $alcohol->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <label class="form-label" for="name">Kategória neve</label>

            <input class="form-control"
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $alcohol->name) }}"
                required
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <div class="form-gombok">

                <button type="submit" class="btn mentes-gomb">
                    Mentés
                </button>

                <a href="{{ route('alcohols.index') }}" class="btn megse-gomb">
                    Mégse
                </a>

            </div>

        </form>

    </div>

</div>

@endsection