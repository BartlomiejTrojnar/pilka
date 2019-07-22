@extends('layouts.app')

@section('header')
  <aside id="arrow_left">
    <a href="{{ route('sedzia.show', $previous) }}">
      <i class='fa fa-chevron-left'></i>
    </a>
  </aside>
  <aside id="arrow_right">
    <a href="{{ route('sedzia.show', $next) }}">
      <i class='fa fa-chevron-right'></i>
    </a>
  </aside>
  <h1>{{ $referee->first_name }} {{ $referee->last_name }}</h1>
@endsection


@section('main-content')
  <p>{{ $country->id }}</p>
  <p>{{ $country->symbol }}</p>
  <p>{{ $country->continent }}</p>
@endsection