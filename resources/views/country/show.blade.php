@extends('layouts.app')

@section('header')
  <aside id="arrow_left">
    <a href="{{ route('panstwo.show', $previous) }}">
      <i class='fa fa-chevron-left'></i>
    </a>
  </aside>
  <aside id="arrow_right">
    <a href="{{ route('panstwo.show', $next) }}">
      <i class='fa fa-chevron-right'></i>
    </a>
  </aside>
  <h1>{{ $country->name }}</h1>
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
