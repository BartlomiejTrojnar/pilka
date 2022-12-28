@extends('layouts.app')

@section('java-script')
   <script language="javascript" type="text/javascript" src="{{ asset('js/stadium/index.js') }}"></script>
@endsection

@section('header')
   <h1>Stadiony</h1>
@endsection

@section('main-content')
   <?php echo $stadiumsTable; ?>
@endsection