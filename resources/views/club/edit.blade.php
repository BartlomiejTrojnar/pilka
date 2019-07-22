@extends('layouts.app')

@section('header')
  <h1>Zamiana danych klubu</h1>
@endsection

@section('main-content')
  <form action="{{ route('klub.update', $club->id) }}" method="post" role="form">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
    <table>
      <tr>
        <th><label for="name">nazwa</label></th>
        <td><input type="text" name="name" value="{{ $club->name }}" size="20" maxlength="25" /></td>
      </tr>
      <tr>
        <th><label for="city">miasto</label></th>
        <td><input type="text" name="city" value="{{ $club->city }}" size="15" maxlength="15" /></td>
      </tr>
      <tr>
        <th><label for="year_of_establishment">rok założenia</label></th>
        <td><input type="text" name="year_of_establishment" value="{{ $club->year_of_establishment }}" size="4" maxlength="4" /></td>
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