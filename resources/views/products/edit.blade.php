@extends('layouts.app')
 
@section('title', __('Termék módosítása'))
 
@section('content')
    <h1>Termék módosítása</h1>
 
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')
 
        <label for="name">Termék neve</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror
 
        <label for="price">Ár</label>
        <input type="text" name="price" id="price" value="{{ old('price', $product->price) }}" required>
        @error('price')
        <div class="error">{{ $message }}</div>
        @enderror
 
        <label for="alcohol_id">Kategória</label>
        <select name="alcohol_id" id="alcohol_id" required>
            <option value="">Válassz kategóriát</option>
            @foreach($alcohols as $alcohol)
                <option value="{{ $alcohol->id }}" @selected(old('alcohol_id', $product->alcohol_id) == $alcohol->id)>
                    {{ $alcohol->name }}
                </option>
            @endforeach
        </select>
        @error('alcohol_id')
        <div class="error">{{ $message }}</div>
        @enderror
 
        <button type="submit">Mentés</button>
        <a href="{{ route('products.index') }}">Mégse</a>
    </form>
@endsection
 
 