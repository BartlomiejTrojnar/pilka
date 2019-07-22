@extends('layouts.app')
@section('header')
  <h1>Zamiana danych sędziego</h1>
@endsection

@section('main-content')
  <form action="{{ route('sedzia.update', $referee->id) }}" method="post" role="form">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
    <table>
      <tr>
        <th><label for="first_name">imię</label></th>
        <td><input type="text" name="first_name" size="20" maxlength="25" value="{{$referee->first_name}}" /></td>
      </tr>
      <tr>
        <th><label for="last_name">nazwisko</label></th>
        <td><input type="text" name="last_name" size="20" maxlength="25" value="{{$referee->last_name}}" /></td>
      </tr>
      <tr>
        <th><label for="country_id">państwo</label></th>
        <td><?php   print_r($countrySelectField);  ?></td>
      </tr>
      <tr>
        <th><label for="district">okręg</label></th>
        <td><input type="text" name="district" size="20" maxlength="25" value="{{$referee->district}}" /></td>
      </tr>
      <tr>
        <th><label for="date_of_birth">data urodzenia</label></th>
        <td><input type="date" name="date_of_birth" value="{{$referee->date_of_birth}}" /></td>
      </tr>
      <tr>
        <th><label for="active">aktywny?</label></th>
        <td><input type="checkbox" name="active" value="{{$referee->active}}" /></td>
      </tr>
      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-success" type="submit">zapisz zmiany</button>
          <a class="btn btn-success" href="{{ route('sedzia.index') }}">anuluj</a>
      </tr>
    </table>
  </form>
@endsection