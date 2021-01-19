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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

  <nav id="main-menu">
    <ul class="nav flex-column">
      <li><a href="/bazy/pilka/public">menu główne</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('panstwo.index') }}">państwa</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('sedzia.index') }}">sędziowie</a></li>
      <li><a href="{{ route('stadion.index') }}">stadiony</a></li>
      <li><a href="{{ route('zawodnik.index') }}">zawodnicy</a></li>
      <li><a href="{{ route('klub.index') }}">kluby</a></li>
      <li><a href="{{ route('rozgrywki.index') }}">rozgrywki</a></li>
    </ul>
  </nav>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>

  @section('java-script')
    @show
</body>
</html>