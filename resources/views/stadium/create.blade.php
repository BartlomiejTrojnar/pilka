@extends('layouts.app')

@section('main-content')
  <h1>Dodawanie stadionu</h1>
  <form action="{{ route('stadion.store') }}" method="post" role="form">
  {{ csrf_field() }}
    <table>
      <tr>
        <th><label for="city">miasto</label></th>
        <td><input type="text" name="city" size="15" maxlength="15" /></td>
      </tr>
      <tr>
        <th><label for="name">nazwa</label></th>
        <td><input type="text" name="name" size="22" maxlength="25" /></td>
      </tr>
      <tr>
        <th><label for="capacity">pojemność</label></th>
        <td><input type="text" name="capacity" size="5" maxlength="5" /></td>
      </tr>

      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-success" type="submit">dodaj</button>
          <a class="btn btn-success" href="{{ $_SERVER['HTTP_REFERER'] }}">anuluj</a>
      </td></tr>
    </table>
  </form>
@endsection