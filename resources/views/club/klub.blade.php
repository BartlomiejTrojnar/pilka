<?php
/* ------------------------- skrypt obsługujący widok dla klubu ------------------------- */
/* -------------------- (C) mgr inż. Bartłomiej Trojnar; (III) marzec 2018 -------------------- */
?>

@extends('master')
@section('header')
  <h1>{{{$klub->nazwa}}} {{{$klub->miasto}}}</h1>
@stop

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