@extends('layouts.app')

@section('content')
    <h1> Jūsu sodi!!! </h1>
    
    @if(count($sods)>0)
        @foreach($sods as $sods)
            <div class= "well">
                <h3>Auto: {{$sods->auto}}  Summa: {{$sods->summa}}  Vieta: {{$sods->vieta}}  Laiks: {{$sods->created_at}}</h2>
            </div>
        @endforeach
    @endif

@endsection