@extends('layouts.app')
@section('main-content')
  <h1>Dodawanie sędziego</h1>
  <form action="{{ route('sedzia.store') }}" method="post" role="form">
  {{ csrf_field() }}
    <table>
      <tr>
        <th><label for="first_name">imię</label></th>
        <td><input type="text" name="first_name" size="20" maxlength="25" /></td>
      </tr>
      <tr>
        <th><label for="last_name">nazwisko</label></th>
        <td><input type="text" name="last_name" size="20" maxlength="25" /></td>
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
        <th><label for="district">okręg</label></th>
        <td><input type="text" name="district" size="20" maxlength="25" /></td>
      </tr>
      <tr>
        <th><label for="date_of_birth">data urodzenia</label></th>
        <td><input type="date" name="date_of_birth" /></td>
      </tr>
      <tr>
        <th><label for="active">aktywny?</label></th>
        <td><input type="checkbox" name="active" /></td>
      </tr>
      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-success" type="submit">dodaj</button>
          <a class="btn btn-success" href="{{ $_SERVER['HTTP_REFERER'] }}">anuluj</a>
      </td></tr>
    </table>
  </form>
@endsection