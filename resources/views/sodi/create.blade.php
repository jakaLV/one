@extends('layouts.app')

@section('content')
    @if(Auth::id()==1)

    <h1> Izveidot sodu </h1>

    
    {!! Form::open(['action' => 'SodiController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div>
        {{Form::label('auto', 'Auto')}}
        {{Form::text('auto', '')}}
    </div>
    <div>
        {{Form::label('summa', 'Summa')}}
        {{Form::text('summa', '')}}
    </div>
    <div>
        {{Form::label('vieta', 'Vieta')}}
        {{Form::text('vieta', '')}}
    </div>
    <div>
        {{Form::label('user_id', 'user_id')}}
        {{Form::text('user_id', '')}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Izveidot', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    @endif
@endsection