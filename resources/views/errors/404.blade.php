@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code')

    <div class="img"></div>
    <div class="overlay">
        <div class="text">
            <h1 class="text-1">OOPS!</h1>
            <h3 class="text-2"> WE CAN'T SEEM TO FIND THE PAGE
                YOU'RE LOOKING FOR.</h3>
        <div class="btn"><a href="/">RETURN TO HOMEPAGE</a></div>
        </div>
    </div>

@endsection
