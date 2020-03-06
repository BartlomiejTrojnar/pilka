@extends('layouts.app')
@section('main-content')
  <h1>Dodawanie zawodnika</h1>
  <form action="{{ route('zawodnik.store') }}" method="post" role="form">
  {{ csrf_field() }}
    <table>
      <tr>
        <th><label for="last_name">nazwisko</label></th>
        <td><input type="text" name="last_name" size="20" maxlength="25" /></td>
      </tr>
      <tr>
        <th><label for="first_name">imiona</label></th>
        <td><input type="text" name="first_name" size="20" maxlength="25" /></td>
      </tr>
      <tr>
        <th><label for="country_id">państwo</label></th>
        <td>
          <select name="country_id" size="1">
            @foreach($countries as $country)
              <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr>
        <th><label for="date_of_birth">data urodzenia</label></th>
        <td><input type="date" name="date_of_birth" /></td>
      </tr>
      <tr>
        <th><label for="city_of_birth">miejsce urodzenia</label></th>
        <td><input type="text" name="city_of_birth" size="10" maxlength="10" /></td>
      </tr>

      <tr>
        <th><label for="matches">mecze</label></th>
        <td><input type="number" name="matches" size="3" maxlength="3" /></td>
      </tr>
      <tr>
        <th><label for="minutes">minuty</label></th>
        <td><input type="number" name="minutes" size="4" maxlength="5" /></td>
      </tr>
      <tr>
        <th><label for="goals">gole</label></th>
        <td><input type="number" name="goals" size="3" maxlength="4" placeholder="0" /></td>
      </tr>

      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-success" type="submit">dodaj</button>
          <a class="btn btn-success" href="{{ $_SERVER['HTTP_REFERER'] }}">anuluj</a>
      </td></tr>
    </table>
  </form>
@endsection