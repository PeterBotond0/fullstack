@extends('layouts.app')
 
@section('title', __('Kategória módosítása'))
 
@section('content')
    <h1>Kategória módosítása</h1>
 
    <form action="{{ route('alcohols.update', $alcohol->id) }}" method="POST">
        @csrf
        @method('PATCH')
 
        <label for="name">Kategória neve</label>
        <input type="text" name="name" id="name" value="{{ old('name', $alcohol->name) }}" required>
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror
 
        <button type="submit">Mentés</button>
        <a href="{{ route('alcohols.index') }}">Mégse</a>
    </form>
@endsection