@extends('layouts.app')

@section('header')
  <aside id="arrow_left">
    <a href="{{ route('stadion.show', $previous) }}">
      <i class='fa fa-chevron-left'></i>
    </a>
  </aside>
  <aside id="arrow_right">
    <a href="{{ route('stadion.show', $next) }}">
      <i class='fa fa-chevron-right'></i>
    </a>
  </aside>
  <h1>{{ $stadium->name }}</h1>
@endsection



@section('system')
  {{{$stadion->miasto}}} <strong> {{{$stadion->nazwa}}} </strong>
  <p><a href="{{url('stadiony/'.$stadion->id.'/edit')}}">
      <span class="glyphicon glyphicon-edit"></span> Edycja </a>
  </p>
  <p><a href="{{url('stadiony/'.$stadion->id.'/delete')}}">
      <span class="glyphicon glyphicon-trash"></span> Usunięcie </a>
  </p>
  <p>Ostatnia edycja: {{$stadion->updated_at}}</p>
  <p>
    @if($stadion->panstwo_id)
      Państwo: {{link_to('panstwa/' . $stadion->panstwo_id, $stadion->panstwo->nazwa)}}
    @endif
  </p>
@stop

@section('foot')
  aktualizacja: 21 marca 2018 r.
@stop