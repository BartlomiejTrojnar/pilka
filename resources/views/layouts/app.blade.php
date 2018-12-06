<?php
use App\Country;
use App\Referee;
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Piłka nożna</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @section('css')
    @show
</head>

<body>
  <header>
    @section('header')
      @show
  </header>

  <section id="main-content">
    @section('main-content')
      @show
  </section>

  <nav>
    <ul class="nav flex-column">
      <li><a href="/bazy/pilka/public">menu główne</a></li>
      <li><a href="{{ route('panstwo.index') }}">państwa</a></li>
      <li><a href="{{ route('sedzia.index') }}">sędziowie</a></li>
      <li><a href="{{ route('stadion.index') }}">stadiony</a></li>
      <li><a href="{{ route('zawodnik.index') }}">zawodnicy</a></li>
      <li><a href="{{ route('klub.index') }}">kluby</a></li>
    </ul>
  </nav>
</body>
</html>