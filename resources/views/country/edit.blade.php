@extends('layouts.app')
@section('header')
  <h1>Zamiana danych państwa</h1>
@endsection

@section('main-content')
  <form action="{{ route('panstwo.update', $country->id) }}" method="post" role="form">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  <table>
      <tr>
        <th><label for="symbol">symbol</label></th>
        <td><input type="text" name="symbol" value="{{ $country->symbol }}" /></td>
      </tr>
      <tr>
        <th><label for="name">nazwa</label></th>
        <td><input type="text" name="name" value="{{ $country->name }}" /></td>
      </tr>
      <tr>
        <th><label for="continent">kontynent</label></th>
        <td><?php  print_r($continentSelectField);  ?></td>
      </tr>
      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-success" type="submit">zapisz zmiany</button>
          <a class="btn btn-success" href="{{ $_SERVER['HTTP_REFERER'] }}">anuluj</a>
      </tr>
  </table>
  </form>
@endsection