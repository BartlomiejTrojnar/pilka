@extends('layouts.app')

@section('java-script')
   <script language="javascript" type="text/javascript" src="{{ asset('js/referee/index.js') }}"></script>
@endsection

@section('header')
  <h1>Sędziowie</h1>
@endsection

@section('main-content')
   <div class="c">{!! $referees->render() !!}</div>
   @if( !count($referees) && (empty($_GET['page']) || $_GET['page']>1) )
      <ul class="pagination">
         <li><a id="jumpToThePage" href="{{route('sedzia.index', 'page=1')}}">1</a></li>
      </ul>
   @endif
   <?php echo $tableForIndex; ?>
@endsection