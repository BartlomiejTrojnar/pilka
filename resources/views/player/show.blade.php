@extends('layouts.app')

@section('header')
   <aside id="arrow_left"><a href="{{ route('zawodnik.show', $previous) }}"> <i class='fa fa-chevron-left'></i></a></aside>
   <aside id="arrow_right"><a href="{{ route('zawodnik.show', $next) }}"> <i class='fa fa-chevron-right'></i></a></aside>
   <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>
   <input id="player_id" type="hidden" name="player_id" value="{{ $player->id }}" />
@endsection


@section('main-content')
   <ul class="nav nav-tabs nav-justified">
      <li class="nav-item"><a class="nav-link" href="{{ url('zawodnik/'.$player->id.'/showInfo') }}">informacje <i class='fas fa-info-circle'></i></a></li>
      <?php /*
         <li class="nav-item"><a class="nav-link" href="{{ url('klasa/'.$grade->id.'/showEnlargements') }}">rozszerzenia</a></li>
         <li class="nav-item"><a class="nav-link" href="{{ url('klasa/'.$grade->id.'/showRatings') }}">oceny <i class="fa fa-star-half-empty"></i></a></li>
         <li class="nav-item"><a class="nav-link" href="{{ url('klasa/'.$grade->id.'/showDeclarations') }}">deklaracje <i class="far fa-newspaper"></i></a></li>
      */ ?>
      <li class="nav-item"><a class="nav-link" href="{{ route('zawodnik.index') }}">powrót <i class='fa fa-undo'></i></a></li>
   </ul>

   <?php echo $subView; ?>
@endsection