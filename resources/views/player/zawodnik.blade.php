<?php
/* ------------------------- skrypt obsługujący widok dla zawodnika ------------------------- */
/* -------------------- (C) mgr inż. Bartłomiej Trojnar; (III) marzec 2018 -------------------- */
?>

@extends('master')
@section('header')
    <h1>{{{$zawodnik->imie}}} {{{$zawodnik->nazwisko}}}</h1>
@stop

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