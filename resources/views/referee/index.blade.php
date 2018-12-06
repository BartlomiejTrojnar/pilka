@extends('layouts.app')
@section('main-content')
  <h1>Sędziowie</h1>
  <table id="referees">
    <thead>
      <tr>
        <th>id</th>
        <th>imiona</th>
        <th>nazwisko</th>
        <th>państwo</th>
        <th>okręg</th>
        <th>data urodzenia</th>
        <th>aktywny</th>
        <th>data wpisania</th>
        <th>data aktualizacji</th>
        <th colspan="2">+/-</th>
      </tr>
    </thead>
    <tbody>
    @foreach($referees as $referee)
      <tr>
        <td>{{ $referee->id }}</td>
        <td>{{ $referee->first_name }}</td>
        <td><a href="{{ route('sedzia.show', $referee->id) }}">{{ $referee->last_name }}</a></td>
        <td>{{ $referee->country->name }}</td>
        <td>{{ $referee->district }}</td>
        <td>{{ $referee->date_of_birth }}</td>
        <td>{{ $referee->active }}</td>
        <td>{{ $referee->created_at }}</td>
        <td>{{ $referee->updated_at }}</td>
        <td><a href="{{ route('sedzia.edit', $referee->id) }}"><img class="edit" src="{{ asset('css/zmiana.png') }}" alt="[]"></a></td>
        <td>
          <form action="{{ route('sedzia.destroy', $referee->id) }}" method="post" id="delete-form-{{$referee->id}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button><img class="destroy" src="{{ asset('css/minus.png') }}" /></button>
          </form>
        </td>
      </tr>
    @endforeach
      <tr class="create">
        <td colspan="11"><a href="{{ route('sedzia.create') }}"><img class="create" src="{{ asset('css/plus.png') }}" /></a></td>
      </tr>
    </tbody>
  </table>
@endsection