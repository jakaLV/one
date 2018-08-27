@extends('layouts.app')

@section('content')
    @guest
    <h1> Lūdzu autroizēties(login)</h1>

    @elseif(Auth::user()->type=='Admin')

    <h1> Izveidot sodu </h1>
    <div>
        <a href='/sods/create' class="btn btn-primary">Izveidot</a>
    </div>
    <br>
    <h1> Sodu saraksts </h1>
    @foreach($sods as $sods)
    <table style="width: 90%;" border="1">>
        <tbody>
            <tr>
            <td><img style="width:20%" src="/storage/cover_images/{{$sods->cover_image}}" alt="Bildes nav"></td>
            <td>Auto: {{$sods->auto}}  </td>
            <td>Summa: {{$sods->summa}}</td>
            <td>Vieta: {{$sods->vieta}}</td>
            <td>Laiks: {{$sods->created_at}}</td>
            <td>
                <hr>
                {!!Form::open(['action' => ['SodiController@destroy', $sods->id], 'method' =>'POST', ])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Dzest', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </td>
            <td> 
                <hr>
                <a href='/sods/{{$sods->id}}/edit' class="btn btn-primary">Labot</a> 
            </tr>
        </tbody>
    </table>

    @endforeach

    @elseif(Auth::user()->type =='Regular')
        <h1> Jūsu sodi!!! </h1>
        <div>
        <a href='/sods/show' class="btn btn-primary">Apskatīt</a>
    </div>
    @endif
@endsection