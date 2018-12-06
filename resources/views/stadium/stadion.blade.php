<?php
/* ------------------------- skrypt obsługujący widok dla stadionu ------------------------- */
/* -------------------- (C) mgr inż. Bartłomiej Trojnar; (III) marzec 2018 -------------------- */
?>

@extends('master')
@section('header')
  <h1>{{{$stadion->miasto}}} {{{$stadion->nazwa}}}</h1>
@stop

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