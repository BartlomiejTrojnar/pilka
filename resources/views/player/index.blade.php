<?php
/* ------------------------- skrypt obsługujący widok wszystkich zawodników ------------------------- */
/* -------------------- (C) mgr inż. Bartłomiej Trojnar; (III) marzec 2018 -------------------- */
$pathOrder = '/bazy/pilka/public/zawodnicy/order/';
?>
@extends('master')

@section('title')
  Zawodnicy
@stop

@section('header')
  <h1>Zawodnicy</h1>
@stop

@section('system')
  {{ $zawodnicy->links() }}
  <table>
    <tr>
        <th><a href='{{$pathOrder}}id'>id</a></th>
        <th><a href="{{$pathOrder}}nazwisko">nazwisko</a></th>
        <th><a href="{{$pathOrder}}imie">imię</a></th>
        <th><a href="{{$pathOrder}}drugie_imie">drugie imię</a></th>
        <th><a href="{{$pathOrder}}data_ur">data urodzienia</a></th>
        <th><a href="{{$pathOrder}}miejsce_ur">miejsce urodzienia</a></th>
        <th><a href="{{$pathOrder}}mecze">mecze</a></th>
        <th><a href="{{$pathOrder}}bramki">bramki</a></th>
        <th><a href="{{$pathOrder}}idpanstwa">państwo</a></th>
        <th><a href="{{$pathOrder}}data_aktual">data aktualizacji</a></th>
        <th colspan="2">+/-</th>
    </tr>

    @foreach($zawodnicy as $zawodnik)
      <tr class="zawodnik">
        <td>{{{$zawodnik->id}}}</td>
        <td><a href="{{url('zawodnicy/'.$zawodnik->id)}}">{{{$zawodnik->nazwisko}}}</a></td>
        <td>{{{$zawodnik->imie}}}</td>
        <td>{{{$zawodnik->drugie_imie}}}</td>
        <td>{{{$zawodnik->data_ur}}}</td>
        <td>{{{$zawodnik->miejsce_ur}}}</td>
        <td>{{{$zawodnik->mecze}}}</td>
        <td>{{{$zawodnik->bramki}}}</td>
        <td>{{{$zawodnik->idpanstwa}}}</td>
        <td>{{{$zawodnik->data_aktual}}}</td>

        <td class="modify">
            <a href="{{url('zawodnicy/edit/'.$zawodnik->id)}}">
                <img data-idzawodnika="{{{$zawodnik->id}}}" src="/bazy/pilka/app/views/css/zmiana.png" alt="++" />
            </a>
        </td>
        <td class="remove">
            <a href="{{url('zawodnicy/'.$zawodnik->id.'/delete')}}">
                <img data-idzawodnika="{{{$zawodnik->id}}}" src="/bazy/pilka/app/views/css/minus.png" alt="--" />
            </a>
        </td>
    </tr>
  @endforeach

    <tr>
        <td class="dodawanie" colspan="9">
            <a href="/bazy/pilka/public/sedzia/create">
                <img src="/bazy/pilka_nozna/css/plus.png" alt="++" />
            </a>
        </td>
    </tr>
  </table>
@stop

@section('foot')
  aktualizacja: 21 marca 2018 r.
@stop