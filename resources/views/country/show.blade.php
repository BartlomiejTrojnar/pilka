@extends('layouts.app')
@section('header')
  <h1>{{ $country->name }}</h1>
  <aside id="strzalka_l">
    <a href="{{ route('panstwo.show', $previous) }}">
      <img src="{{ asset('css/strzalka_l1.png') }}" alt="poprzednia">
    </a>
  </aside>
  <aside id="strzalka_p">
    <a href="{{ route('panstwo.show', $next) }}">
      <img src="{{ asset('css/strzalka_p1.png') }}" alt="nastepna">
    </a>
  </aside>
@endsection

@section('main-content')
  <p>{{ $country->id }}</p>
  <p>{{ $country->symbol }}</p>
  <p>{{ $country->continent }}</p>
@endsection