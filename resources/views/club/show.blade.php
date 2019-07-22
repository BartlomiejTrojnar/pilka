@extends('layouts.app')

@section('header')
  <aside id="arrow_left">
    <a href="{{ route('klub.show', $previous) }}">
      <i class='fa fa-chevron-left'></i>
    </a>
  </aside>
  <aside id="arrow_right">
    <a href="{{ route('klub.show', $next) }}">
      <i class='fa fa-chevron-right'></i>
    </a>
  </aside>
  <h1>{{ $club->name }}</h1>
@endsection


@section('main-content')
  <ul class="nav nav-tabs nav-justified">
    <li class="nav-item"><a class="nav-link" href="{{ url('klub/'.$club->id.'/showInfo') }}">informacje</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('klub/'.$club->id.'/showPlayers') }}">zawodnicy</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('klub.index') }}">powrót</a></li>
  </ul>

  <?php
    echo $subView;
  ?>
@endsection