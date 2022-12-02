@extends('layouts.app', ['pageTitle'=>'MOVY'], ['title'=>'MOVY'])

@push('css')
<link rel="stylesheet" href="{{asset('assets\css\showtimes.css')}}">
@endpush

@section('content')
<div class="text-right">
    <a href="{{ asset('booking/check') }}" class="orange-btn mt-5 mr-5">Check Booking</a>
</div>
<section id="homepage">
    <div class="container">
        <div class="row row-movie-container p-3">
            @foreach($movies as $shows)
            <div class="col-1-4-movie-container">        
                <img src="assets/img/{{$shows['image']}}" alt="" class="image">
                <div class="overlay">
                    <div class="text">
                        <p class="movie-name">{{$shows['name']}}</p>
                        <p class="movie-type">{{$shows['type']}}</p>
                        <p class="movie-date">{{$shows['releasedDate']}}</p>
                        <p class="movie-info">{{$shows['language']}} ‧ {{$shows['duration']}}</p>
                        <a href="{{action('\App\Http\Controllers\MoviesController@moviesDetails',$shows['id'])}}"><button class="button-info" >Movie Info</button></a>
                    </div>
                </div>    
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection