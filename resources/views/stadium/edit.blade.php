@extends('layouts.app')
@section('header')
  <h1>Zamiana danych stadionu</h1>
@endsection

@section('main-content')
  <form action="{{ route('stadion.update', $stadium->id) }}" method="post" role="form">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
    <table>
      <tr>
        <th><label for="city">miasto</label></th>
        <td><input type="text" name="city" size="15" maxlength="15" value="{{$stadium->city}}" /></td>
      </tr>
      <tr>
        <th><label for="name">nazwa</label></th>
        <td><input type="text" name="name" size="22" maxlength="25" value="{{$stadium->name}}" /></td>
      </tr>
      <tr>
        <th><label for="capacity">pojemność</label></th>
        <td><input type="text" name="capacity" size="5" value="{{$stadium->capacity}}" /></td>
      </tr>
      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-success" type="submit">zapisz zmiany</button>
          <a class="btn btn-success" href="{{ $_SERVER['HTTP_REFERER'] }}">anuluj</a>
      </tr>
    </table>
  </form>
@endsection