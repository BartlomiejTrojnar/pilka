@extends('layouts.app')

@section('java-script')
  <script language="javascript" type="text/javascript" src="{{ asset('js/referee.js') }}"></script>
@endsection

@section('header')
  <h1>Sędziowie</h1>
@endsection

@section('main-content')
  <?php
    echo $refereeTable;
  ?>
@endsection