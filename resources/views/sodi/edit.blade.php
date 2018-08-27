@extends('layouts.app')

@section('content')
    
    <h1> Labot sodu</h1>

    {!! Form::open(['action' => ['SodiController@update', $sods->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div>
        {{Form::label('auto', 'Auto')}}
        {{Form::text('auto', $sods->auto)}}
    </div>
    <div>
        {{Form::label('summa', 'Summa')}}
        {{Form::text('summa', $sods->summa)}}
    </div>
    <div>
        {{Form::label('vieta', 'Vieta')}}
        {{Form::text('vieta', $sods->vieta)}}
    </div>
    <div>
        {{Form::label('user_id', 'user_id')}}
        {{Form::text('user_id', $sods->user_id)}}
    </div> 
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Atjaunot', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}


@endsection