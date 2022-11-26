@extends('layouts.app')
@push('css')
@endpush
<title>{{$foods->name}}</title>
<link rel="stylesheet" href="{{asset('assets\css\foodInfo.css')}}">
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
            <h1>{{$foods->name}}</h1>
        </div>   
        <div class="movie-trailer">
            <img src="/assets/img/{{$foods->image}}" alt="">
        </div>
        
        <div class="movie-details">   
            <p class="col1">Inclusive Of :</p>
            <p class="col2">{{$foods->description}}</p>
            <p class="col1">Price :</p>
            <p class="col2">RM {{$foods->price}}</p>
            <form action="/addCart" method="POST">
                @csrf
                <input type="hidden" name="foodID" value="{{$foods->id}}">
            <a href="#"><button class="btn-cart">&#128722;Add To Cart</button></a>
            </form>
        </div>
    </div>
</section>

