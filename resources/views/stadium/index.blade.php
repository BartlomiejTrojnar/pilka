<?php
/* ------------------------- skrypt obsługujący widok wszystkich stadionów ------------------------- */
/* -------------------- (C) mgr inż. Bartłomiej Trojnar; (III) marzec 2018 -------------------- */
$pathOrder = '/bazy/pilka/public/stadiony/order/';
?>
@extends('master')

@section('title')
  Stadiony
@stop

@section('header')
  <h1>Stadiony</h1>
@stop

@section('system')
  {{ $stadiony->links() }}
  <table>
    <tr>
        <th><a href="{{$pathOrder}}id">id</a></th>
        <th><a href="{{$pathOrder}}miasto">miasto</a></th>
        <th><a href="{{$pathOrder}}nazwa">nazwa</a></th>
        <th><a href="{{$pathOrder}}stare_nazwy">stare nazwy</a></th>
        <th><a href="{{$pathOrder}}imienia">imienia</a></th>
        <th><a href="{{$pathOrder}}pojemnosc">pojemność</a></th>
        <th><a href="{{$pathOrder}}idpanstwa">państwo</a></th>
        <th colspan="2">+/-</th>
    </tr>

    @foreach($stadiony as $stadion)
      <tr class="stadion">
        <td>{{{$stadion->id}}}</td>
        <td>{{{$stadion->miasto}}}</td>
        <td><a href="{{url('stadiony/'.$stadion->id)}}">{{{$stadion->nazwa}}}</a></td>
        <td>{{{$stadion->stare_nazwy}}}</td>
        <td>{{{$stadion->imienia}}}</td>
        <td>{{{$stadion->pojemnosc}}}</td>
        <td>{{{$stadion->idpanstwa}}}</td>

        <td class="modify">
            <a href="{{url('stadiony/edit/'.$stadion->id)}}">
                <img data-idstadionu="{{{$stadion->id}}}" src="/bazy/pilka/app/views/css/zmiana.png" alt="++" />
            </a>
        </td>
        <td class="remove">
            <a href="{{url('stadiony/'.$stadion->id.'/delete')}}">
                <img data-idstadionu="{{{$stadion->id}}}" src="/bazy/pilka/app/views/css/minus.png" alt="--" />
            </a>
        </td>
      </tr>
    @endforeach

    <tr>
        <td class="dodawanie" colspan="9">
            <a href="/bazy/pilka/public/stadion/create">
                <img src="/bazy/pilka_nozna/css/plus.png" alt="++" />
            </a>
        </td>
    </tr>
  </table>
@stop

@section('foot')
  aktualizacja: 21 marca 2018 r.
@stop