@extends('layouts.app')
@push('css')
@endpush
<title>{{$movies->name}}</title>

<link rel="stylesheet" href="{{asset('assets\css\moviesInfo.css')}}">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- Scroll to Top Function -->
<button onclick="scrollToTopFunction()" id="topButton" title="Go to top">Top</button>


<script>
    var topbutton = document.getElementById("topButton");
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            topbutton.style.display = "block";
        } else {
            topbutton.style.display = "none";
        }
    }
    function scrollToTopFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<!--  Movies Info Page -->
<section id="mvpage">

    <div class="movie-info-container">
        <div class=movie-title>
            <div class="text-left">
                <a href="{{ asset('showtimes') }}" class="back-button" >Back</a>
            </div> 
            <h1>{{$movies->name}}</h1>
        </div>
        <div class="movie-trailer">
            <iframe width="560" height="349" src="{{$movies->trailer}}" frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="movie-details">
            <span class="genre-lang-time">{{$movies->type}} - {{$movies->language}} - {{$movies->duration}}</span>          
            <p></p>
            <p class="col1">Release Date </p>
            <p class="col2">{{$movies->releasedDate}}</p>
            <p class="col1">Director </p>
            <p class="col2">{{$movies->director}}</p>
            <p class="col1">Cast </p>
            <p class="col2">{{$movies->casts}}</p>
            <p class="col1">Synopsis </p>
            <p class="col2">{{$movies->synopsis}}</p>
            <a href="{{ action('\App\Http\Controllers\BookingController@index',$movies->id) }}"><button class="btn-booking">&#127915;Booking</button></a>
            
        </div>
    </div>

</section>

