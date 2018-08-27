@extends('layouts.app')

@section('content')
    <h1> Izveido lietotaju </h1>
    @if($user->type=="Admin")
    <h1> Hello Admin </h1>
    <div class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>
@endif
@endsection