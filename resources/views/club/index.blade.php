<?php
/* ------------------------- skrypt obsługujący widok wszystkich klubów ------------------------- */
/* -------------------- (C) mgr inż. Bartłomiej Trojnar; (III) marzec 2018 -------------------- */
$pathOrder = '/bazy/pilka/public/kluby/order/';
?>
@extends('master')

@section('title')
  Kluby
@stop

@section('header')
  <h1>Kluby</h1>
@stop

@section('system')
  {{ $kluby->links() }}
  <table>
    <tr>
      <th><a href='{{$pathOrder}}id'>id</a></th>
      <th><a href="{{$pathOrder}}panstwo">państwo</a></th>
      <th><a href="{{$pathOrder}}nazwisko">nazwa</a></th>
      <th><a href="{{$pathOrder}}imie">miasto</a></th>
      <th colspan="2">+/-</th>
    </tr>

    @foreach($kluby as $klub)
      <tr class="klub">
        <td>{{{$klub->id}}}</td>
        <td>{{{$klub->panstwo->nazwa}}}</td>
        <td><a href="{{url('kluby/'.$klub->id)}}">{{{$klub->nazwa}}}</a></td>
        <td>{{{$klub->miasto}}}</td>

        <td class="modify">
          <a href="{{url('kluby/edit/'.$klub->id)}}">
            <img data-idklubu="{{{$klub->id}}}" src="/bazy/pilka/app/views/css/zmiana.png" alt="++" />
          </a>
        </td>
        <td class="remove">
          <a href="{{url('kluby/'.$klub->id.'/delete')}}">
            <img data-idklubu="{{{$klub->id}}}" src="/bazy/pilka/app/views/css/minus.png" alt="--" />
          </a>
        </td>
      </tr>
    @endforeach

    <tr>
      <td class="dodawanie" colspan="9">
        <a href="/bazy/pilka/public/klub/create">
          <img src="/bazy/pilka_nozna/css/plus.png" alt="++" />
        </a>
      </td>
    </tr>
  </table>
@stop

@section('foot')
  aktualizacja: 21 marca 2018 r.
@stop