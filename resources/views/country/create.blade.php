@extends('layouts.app')
@section('main-content')
  <h1>Dodawanie państwa</h1>
  <form action="{{ route('panstwo.store') }}" method="post" role="form">
  {{ csrf_field() }}
    <table>
      <tr>
        <th><label for="symbol">symbol</label></th>
        <td><input type="text" name="symbol" size="4" maxlength="3" /></td>
      </tr>
      <tr>
        <th><label for="name">nazwa</label></th>
        <td><input type="text" name="name" /></td>
      </tr>
      <tr>
        <th><label for="continent">kontynent</label></th>
        <td><?php  print_r($continentSelectField);  ?></td>
      </tr>
      <tr class="submit"><td colspan="2">
          <input type="hidden" name="history_view" value="{{ $_SERVER['HTTP_REFERER'] }}" />
          <button class="btn btn-success" type="submit">dodaj</button>
          <a class="btn btn-success" href="{{ $_SERVER['HTTP_REFERER'] }}">anuluj</a>
      </td></tr>
    </table>
  </form>
@endsection