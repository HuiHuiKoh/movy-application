@extends('layouts.app', ['pageTitle'=>'Showtimes'], ['title'=>'Showtimes'])
@push('css')
@endpush

<link rel="stylesheet" href="{{asset('assets\css\showtimes.css')}}">
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

<!-- Movies Page Navigation -->
@section('content')
<nav class="movie-nav">
    <ul>
        <li style="color: lightgoldenrodyellow;"><b><a href="">NOW SHOWING</a></b></li>
        <li><a href="">COMING SOON</a></li>
    </ul>
</nav>
<hr class="border">

<!-- Now Showing Movies Page -->
<section class="movies">

    <div class="row-movie-container">
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

</section>
@endsection

