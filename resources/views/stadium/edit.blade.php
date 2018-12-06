@extends('master')

@section('header')
    <a href="{{('sedziowie/'.$sedzia->id.'')}}"> &larr; Anuluj </a>
    <h2>
        @if($method == 'post')
            Dodaj nowego sędziego
        @elseif($method == 'delete')
            Usuń sedziego {{$sedzia->nazwisko}}?
        @else
            Edytuj sędziego {{$sedzia->nazwisko}}
        @endif
    </h2>
@stop


@section('system')
    {{Form::model($sedzia, array('method' => $method, 'url' => 'sedziowie/'.$sedzia->id))}}
    @unless($method == 'delete')
    <div class="form-group">
        {{Form::label('Imię')}}
        {{Form::text('imie')}}
    </div>
    <div class="form-group">
        {{Form::label('Nazwisko')}}
        {{Form::text('nazwisko')}}
    </div>
    <div class="form-group">
        {{Form::label('Państwo')}}
        {{Form::select('panstwo_id', $panstwo_options)}}
    </div>
    <div class="form-group">
        {{Form::label('Okręg')}}
        {{Form::text('okreg')}}
    </div>
    <div class="form-group">
        {{Form::label('Data urodzenia')}}
        {{Form::text('data_ur')}}
    </div>
        {{Form::label('Aktywny?')}}
        {{Form::checkbox('aktywny')}}
    </div>
    {{Form::submit("Zapisz", array("class"=>"btn btn-default"))}}

    @else
    {{Form::submit("Usuń", array("class"=>"btn btn-default"))}}
    @endif
    {{Form::close()}}
@stop

@section('foot')
    aktualizacja: 21 sierpnia 2017r.
@stop