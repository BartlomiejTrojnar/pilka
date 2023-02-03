@extends('layouts.app')

@section('java-script')
   <script language="javascript" type="module" src="{{ asset('js/player/index.js') }}"></script>
@endsection

@section('header')
   <h1>Zawodnicy</h1>
@endsection

@section('main-content')
{{ $players->render() }}

<table id="players">
<thead>
   <tr>
      <th>id</th>
      <?php
         echo view('layouts.thSorting', ["thName"=>"imiona",            "routeName"=>"zawodnik.order", "field"=>"first_name", "sessionVariable"=>"PlayerOrder"]);
         echo view('layouts.thSorting', ["thName"=>"nazwisko",          "routeName"=>"zawodnik.order", "field"=>"last_name", "sessionVariable"=>"PlayerOrder"]);
         echo view('layouts.thSorting', ["thName"=>"państwo",           "routeName"=>"zawodnik.order", "field"=>"country_id", "sessionVariable"=>"PlayerOrder"]);
         echo view('layouts.thSorting', ["thName"=>"data urodzenia",    "routeName"=>"zawodnik.order", "field"=>"date_of_birth", "sessionVariable"=>"PlayerOrder"]);
         echo view('layouts.thSorting', ["thName"=>"miejsce urodzenia", "routeName"=>"zawodnik.order", "field"=>"city_of_birth", "sessionVariable"=>"PlayerOrder"]);
         echo view('layouts.thSorting', ["thName"=>"mecze",             "routeName"=>"zawodnik.order", "field"=>"matches", "sessionVariable"=>"PlayerOrder"]);
         echo view('layouts.thSorting', ["thName"=>"minuty",            "routeName"=>"zawodnik.order", "field"=>"minutes", "sessionVariable"=>"PlayerOrder"]);
         echo view('layouts.thSorting', ["thName"=>"gole",              "routeName"=>"zawodnik.order", "field"=>"goals", "sessionVariable"=>"PlayerOrder"]);
      ?>
      <th>data wpisania</th>
      <th>data aktualizacji</th>
      <th>zmień / usuń</th>
   </tr>
   @if(isset($countrySF))
   <tr>
      <td colspan="3"></td>
      <td><?php  print_r($countrySF);  ?></td>
      <td colspan="8"></td>
   </tr>
   @endif
</thead>

<tbody>
   @foreach($players as $player)
   <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $player->first_name }}</td>
      <td><a href="{{ route('zawodnik.show', $player->id) }}">{{ $player->last_name }}</a></td>
      <td><a href="{{ route('panstwo.show', $player->country_id) }}">{{ $player->country->name }}</a></td>
      <td>{{ $player->date_of_birth }}</td>
      <td>{{ $player->city_of_birth }}</td>
      <td>{{ $player->matches }}</td>
      <td>{{ $player->minutes }}</td>
      <td>{{ $player->goals }}</td>
      <td>{{ substr($player->created_at, 0, 10) }}</td>
      <td>{{ substr($player->updated_at, 0, 10) }}</td>
      <td class="editDestroy">
         <button data-player_id="{{ $player->id }}" class="edit"><i class="fa fa-edit"></i></button>
         <button data-player_id="{{ $player->id }}" class="destroy"><i class="fas fa-remove"></i></button>
      </td>
   </tr>
   @endforeach
   <tr class="create"><td colspan="12"><button id="showCreateRow"><i class="fa fa-plus"></i></button>
</tbody>
</table>
<input id="countPlayers" type="hidden" value="{{ count($players) }}" />
@endsection