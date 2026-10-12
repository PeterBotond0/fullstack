@extends('layouts.app')

@section('title', __('Új kategória létrehozása'))

@section('content')

<div class="kategoria-form-oldal">

    <div class="kategoria-form-fejlec">
        <h1>Új kategória</h1>
        <p>Adj hozzá egy új kategóriát az italbolthoz</p>
    </div>

    <div class="kategoria-form-kartya">

        <form action="{{ route('alcohols.store') }}" method="POST">
            @csrf

            <label class="form-label" for="name">Kategória neve</label>

            <input class="form-control"
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                placeholder="Pl. Borok"
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