@extends('layouts.app')

@section('java-script')
  <script language="javascript" type="text/javascript" src="{{ asset('js/player.js') }}"></script>
@endsection

@section('header')
  <h1>Zawodnicy</h1>
@endsection

@section('main-content')
  <?php
    echo $playerTable;
  ?>
@endsection