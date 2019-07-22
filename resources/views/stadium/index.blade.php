@extends('layouts.app')

@section('header')
  <h1>Stadiony</h1>
@endsection

@section('main-content')
  <?php
    echo $stadiumTable;
  ?>
@endsection