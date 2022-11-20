@extends('layouts.app')
@push('css')
@endpush
<title>{{$foods->name}}</title>
<!--<link rel="stylesheet" type="text/css" href="moviesInfo.css"/>-->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- Scroll to Top Function -->
<button onclick="scrollToTopFunction()" id="topButton" title="Go to top">Top</button>
<style>
    
    .movie-title {
        margin-top: 5%;
        margin-bottom: 5%;
        text-align: center;
        color: white;
        text-shadow: 2px 2px 5px whitesmoke;
        font-size: 200%;
    }

    /* Column container */
    .movie-info-container {
        margin: 0% 5%;
    }

    .movie-trailer {
        float: left;
        width: 50%;
        position: relative;
        padding-bottom: 53%; /*16:9 = 56.25%*/
        height: 0;
    }

    .movie-trailer img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 75%;
    }

    .movie-details {
        float: right;
        padding: 0%;
        width: 45%;
    }

    .movie-info-container::after {
        content: "";
        clear: both;
        display: table;
    }

    /* // Movie Details Styles // */
    .movie-details img{
        width: 10%;
    }

    .genre-lang-time{
        width: 70%;
        text-align: right;
        color: white;
        font-size: 110%;
/*        padding-left: 3%;*/
        margin-bottom: 5%;
    }

    .movie-details p{
        
        font-size: 100%;
    }

    .col1{
        text-align: left;
        color: #EFDDB8;   
    }

    .col2{
        color: white;
        line-height: 8px;
        padding-left: 10%;
    }

/*    .col2:hover {
        color: lightgrey;
    }*/

    /* // Button Styles // */
    .btn-booking{
        background-color: black;
        border: lightgrey solid;
        border-radius: 20%;
        color: #FFFFFF;
        text-align: center;
        padding: 3%;
        width: 40%;
        cursor: pointer;
        margin: 3% 20%;
        font-size: 90%;
        transition: all 0.2s;
    }

    .btn-booking:hover{
        transform: translate(0,10%);
        border-color: #2A2A2A;
    }

    /* Responsive layout */
    @media (max-width: 768px) {
        .movie-trailer, .movie-details {
            width: 100%;
        }
    }

</style>

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
            <img src="import/assets/img/{{$foods->image}}" alt="" width="25%" height="25%" >
        </div>
        <div class="movie-details">   
            <p class="col1">Inclusive Of :</p>
            <p class="col2">{{$foods->description}}</p>
            <p class="col1">Price :</p>
            <p class="col2">RM {{$foods->price}}</p>
            <a href="#"><button class="btn-booking">&#128722;Add To Cart</button></a>
        </div>
    </div>
</section>

