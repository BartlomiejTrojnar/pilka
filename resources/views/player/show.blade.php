@extends('layouts.app')

@section('header')
  <aside id="arrow_left">
    <a href="{{ route('zawodnik.show', $previous) }}">
      <i class='fa fa-chevron-left'></i>
    </a>
  </aside>
  <aside id="arrow_right">
    <a href="{{ route('zawodnik.show', $next) }}">
      <i class='fa fa-chevron-right'></i>
    </a>
  </aside>
  <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>
@endsection


@section('system')
  {{{$zawodnik->imie}}} <strong> {{{$zawodnik->nazwisko}}} </strong>
  @if($zawodnik->panstwo_id)
    ({{link_to('panstwa/' . $zawodnik->panstwo_id, $zawodnik->panstwo->nazwa)}})
  @endif
  <p><a href="{{url('zawodnicy/'.$zawodnik->id.'/edit')}}">
      <span class="glyphicon glyphicon-edit"></span> Edycja </a>
  </p>
  <p><a href="{{url('zawodnicy/'.$zawodnik->id.'/delete')}}">
      <span class="glyphicon glyphicon-trash"></span> Usunięcie </a>
  </p>
@stop

@section('foot')
  aktualizacja: 21 marca 2018 r.
@stop