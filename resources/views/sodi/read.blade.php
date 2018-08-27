@extends('layouts.app')

@section('content')
    @guest
    <h1> Lūdzu autroizēties(login)</h1>

    @else
        <h1> Jūsu sodi!!! </h1>
        @foreach($sods as $sods)
            @if($sods->user_id == Auth::id()))
                <div class= "well">
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:75%" src="/storage/cover_images/{{$sods->cover_image}}" alt="Soditais auto">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3>Auto: {{$sods->auto}}  Summa: {{$sods->summa}}  Vieta: {{$sods->vieta}}  Laiks: {{$sods->created_at}} </h3>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
@endsection