@extends('layouts.app')
@section('header')
  <h1>Zamiana danych zawodnika</h1>
@endsection

@section('main-content')
  <form action="{{ route('zawodnik.update', $player->id) }}" method="post" role="form">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
    <table>
      <tr>
        <th><label for="first_name">imię</label></th>
        <td><input type="text" name="first_name" size="15" maxlength="15" value="{{$player->first_name}}" /></td>
      </tr>
      <tr>
        <th><label for="last_name">nazwisko</label></th>
        <td><input type="text" name="last_name" size="15" maxlength="15" value="{{$player->last_name}}" /></td>
      </tr>
      <tr>
        <th><label for="date_of_birth">data urodzenia</label></th>
        <td><input type="date" name="date_of_birth" value="{{$player->date_of_birth}}" /></td>
      </tr>
      <tr>
        <th><label for="city_of_birth">miejsce urodzenia</label></th>
        <td><input type="text" name="city_of_birth" size="15" maxlength="15" value="{{$player->city_of_birth}}" /></td>
      </tr>
      <tr>
        <th><label for="country_id">państwo</label></th>
        <td><?php   print_r($countrySelectField);  ?></td>
      </tr>
      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-success" type="submit">zapisz zmiany</button>
          <a class="btn btn-success" href="{{ $_SERVER['HTTP_REFERER'] }}">anuluj</a>
      </tr>
    </table>
  </form>
@endsection