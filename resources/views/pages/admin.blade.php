@extends('layouts.app')

@section('content')
    <h1> Hello Admin </h1>
    <div class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>
@endsection


