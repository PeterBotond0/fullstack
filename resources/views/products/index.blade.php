@extends('layouts.app')
 
@section('content')
 
    <h1>Termékek</h1>
    <a href="{{route('products.create')}}">Új termék</a>
    @foreach($products as $product)
        <p>{{ $product->name }}
        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Törlés</button>
            <a href="{{ route('products.edit', $product->id) }}">Szerkesztés</a>
 
        </form>
        </p>
    @endforeach
 
@endsection
 