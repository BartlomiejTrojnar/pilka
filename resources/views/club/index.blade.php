@extends('layouts.app')

@section('java-script')
   <script language="javascript" type="text/javascript" src="{{ asset('js/club/index.js') }}"></script>
@endsection

@section('header')
   <h1>Kluby</h1>
@endsection

@section('main-content')
   <?php echo $clubsTable; ?>
@endsection

@section('foot')
   aktualizacja: 22 czerwca 2021 r.
@stop