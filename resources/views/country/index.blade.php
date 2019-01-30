@extends('layouts.app')

@section('header')
  <h1>Państwa</h1>
@endsection

@section('main-content')
  <?php
    echo $countryTable;
  ?>
@endsection