<!-- **********************  (C) mgr inż. Bartłomiej Trojnar; 31.01.2023 ********************** -->
@extends('layouts.app')

@section('java-script')
   <script language="javascript" type="module" src="{{ asset('js/competition/index.js') }}"></script>
@endsection

@section('header')
   <h1>Rozgrywki</h1>
@endsection

@section('main-content')
   @if( !empty( $links ) )
     {{ $competitions->links() }}
   @endif

   <table id="competitions">
   <thead>
      <tr>
         <th>id</th>
         <?php
            echo view('layouts.thSorting', ["thName"=>"nazwa", "routeName"=>"rozgrywki.order", "field"=>"name", "sessionVariable"=>"CompetitionOrder"]);
         ?>
         <th>sezon</th>
         <th>MP</th>
         <th>liga</th>
         <th>puchar</th>
         <th>zmień / usuń</th>
      </tr>
   </thead>
   <tbody>
      @foreach($competitions as $competition)
      <tr>
         <td>{{ $competition->id }}</td>
         <td><a href="{{ route('rozgrywki.show', $competition->id) }}">{{ $competition->competition }}</a></td>
         <td>{{ $competition->season }}</td>
         <td>{{ $competition->MP }}</td>
         <td>{{ $competition->league }}</td>
         <td>{{ $competition->cup }}</td>
         <td class="editDestroy">
            <button data-competition_id="{{ $competition->id }}" class="edit"><i class="fa fa-edit"></i></button>
            <button data-competition_id="{{ $competition->id }}" class="destroy"><i class="fas fa-remove"></i></button>
         </td>
      </tr>
      @endforeach
      <tr class="create"><td colspan="7"><button id="showCreateRow"><i class="fa fa-plus"></i></button>
   </tbody>
   </table>
@endsection

@section('foot')
   aktualizacja: 19 stycznia 2021 r.
@stop