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
  <ul class="nav nav-tabs nav-justified">
    <li class="nav-item"><a class="nav-link" href="{{ url('panstwo/'.$country->id.'/showInfo') }}">informacje</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('panstwo/'.$country->id.'/showPlayers') }}">zawodnicy</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('panstwo/'.$country->id.'/showClubs') }}">kluby</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('panstwo/'.$country->id.'/showStadiums') }}">stadiony</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ url('panstwo/'.$country->id.'/showReferees') }}">sędziowie</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('panstwo.index') }}">powrót</a></li>
  </ul>

  <?php
    echo $subView;
  ?>
@endsection
