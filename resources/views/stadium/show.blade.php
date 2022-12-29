@extends('layouts.app')

@section('header')
   <aside id="arrow_left"><a href="{{ route('stadion.show', $previous) }}"><i class='fa fa-chevron-left'></i></a></aside>
   <aside id="arrow_right"><a href="{{ route('stadion.show', $next) }}"><i class='fa fa-chevron-right'></i></a></aside>
   <h1>{{ $stadium->name }}</h1>
@endsection

@section('main-content')
   <ul class="nav nav-tabs nav-justified">
      <li class="nav-item"><a class="nav-link" href="{{ url('stadion/'.$stadium->id.'/info') }}">informacje</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ url('stadion/'.$stadium->id.'/meczePolski') }}">mecze Polski</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ url('stadion/'.$stadium->id.'/mecze') }}">mecze klubowe</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('stadion.index') }}">powrót</a></li>
   </ul>
   <?php echo $subView;  ?>
@endsection