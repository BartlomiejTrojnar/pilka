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


@section('system')
  {{{$klub->nazwa}}} <strong> {{{$klub->miasto}}} </strong>
  @if($klub->panstwo_id)
    ({{link_to('panstwa/' . $klub->panstwo_id, $klub->panstwo->nazwa)}})
  @endif
  <p><a href="{{url('kluby/'.$klub->id.'/edit')}}">
      <span class="glyphicon glyphicon-edit"></span> Edycja </a>
  </p>
  <p><a href="{{url('kluby/'.$klub->id.'/delete')}}">
      <span class="glyphicon glyphicon-trash"></span> Usunięcie </a>
  </p>
@stop

@section('foot')
  aktualizacja: 21 marca 2018 r.
@stop