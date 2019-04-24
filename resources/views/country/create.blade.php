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
        <td><input type="text" name="continent" /></td>
      </tr>
      <tr class="submit">
        <td colspan="2">
          <button class="btn btn-primary" type="submit">dodaj</button>
          <a class="btn btn-primary" href="{{ route('panstwo.index') }}">anuluj</a>
        </td>
      </tr>
    </table>
  </form>
@endsection