@extends('layouts.app')
@section('header')
  <h1>Dodawanie klubu</h1>
@endsection

@section('main-content')
  <form action="{{ route('klub.store') }}" method="post" role="form">
  {{ csrf_field() }}
    <table>
      <tr>
        <th><label for="name">nazwa</label></th>
        <td><input type="text" name="name" size="20" maxlength="25" /></td>
      </tr>
      <tr>
        <th><label for="city">miasto</label></th>
        <td><input type="text" name="city" size="15" maxlength="15" /></td>
      </tr>
      <tr>
        <th><label for="year_of_establishment">rok założenia</label></th>
        <td><input type="text" name="year_of_establishment" size="4" maxlength="4" /></td>
      </tr>
      <tr>
        <th><label for="country_id ">państwo</label></th>
        <td>
          <select name="country_id" size="1">
            @foreach($countries as $country)
              <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-primary" type="submit">dodaj</button>
          <a class="btn btn-primary" href="{{ $_SERVER['HTTP_REFERER'] }}">anuluj</a>
      </td></tr>
    </table>
  </form>
@endsection