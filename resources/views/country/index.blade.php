@extends('layouts.app')
@section('main-content')
  <h1>Państwa</h1>
  <table id="panstwa">
    <thead>
      <tr>
        <th>id</th>
        <th>symbol</th>
        <th>nazwa</th>
        <th>kontynent</th>
        <th colspan="2">+/-</th>
      </tr>
    </thead>
    <tbody>
    @foreach($countries as $country)
      <tr>
        <td>{{ $country->id }}</td>
        <td>{{ $country->symbol }}</td>
        <td><a href="{{ route('panstwo.show', $country->id) }}">{{ $country->name }}</a></td>
        <td>{{ $country->continent }}</td>
        <td><a href="{{ route('panstwo.edit', $country->id) }}"><img class="edit" src="{{ asset('css/zmiana.png') }}" alt="[]"></a></td>
        <td>
          <form action="{{ route('panstwo.destroy', $country->id) }}" method="post" id="delete-form-{{$country->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button><img class="destroy" src="{{ asset('css/minus.png') }}" /></button>
          </form>
        </td>
      </tr>
    @endforeach
      <tr class="create">
        <td colspan="6"><a href="{{ route('panstwo.create') }}"><img class="create" src="{{ asset('css/plus.png') }}" /></a></td>
      </tr>
    </tbody>
  </table>
@endsection