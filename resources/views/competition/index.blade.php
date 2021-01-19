@extends('layouts.app')

@section('header')
  <h1>Rozgrywki</h1>
@endsection

@section('main-content')
  <?php
    echo $competitionTable;
  ?>
@endsection

@section('foot')
  aktualizacja: 19 stycznia 2021 r.
@stop