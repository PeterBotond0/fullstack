@extends('layouts.app')
 
@section('content')
 
<h1>Kategóriák</h1>
<a href="{{route('alcohols.create')}}">Új kategória</a>
  @foreach($alcohols as $alcohol)
      <p>{{ $alcohol->name }}
        <form action="{{ route('alcohols.destroy', $alcohol->id) }}" method="POST">
  @csrf
  @method('DELETE')
<button type="submit">Törlés</button>
<a href="{{ route('alcohols.edit', $alcohol->id) }}">Szerkesztés</a>
 
        </form>
      </p>
  @endforeach
 
@endsection
 
 