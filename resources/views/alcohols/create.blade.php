@extends('layouts.app')

@section('title', __('Új kategória létrehozása'))

@section('content')
<h1>Új kategória</h1>


  <form action="{{ route('alcohols.store') }}" method="POST">
      @csrf

      <label for="name">Kategória neve</label>
      <input type="text" name="name" id="name" value="{{ old('name') }}" required>
      @error('name')
          <div class="error">{{ $message }}</div>
      @enderror

      <button type="submit">Mentés</button>
      <a href="{{ route('alcohols.index') }}">Mégse</a>
  </form>
@endsection