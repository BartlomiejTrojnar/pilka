@extends('layouts.app')

@section('header')
  <h1>Kluby</h1>
@endsection

@section('main-content')
  <?php
    echo $clubTable;
  ?>
@endsection

@section('foot')
  aktualizacja: 30 stycznia 2019 r.
@stop