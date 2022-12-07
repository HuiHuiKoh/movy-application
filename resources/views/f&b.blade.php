@extends('layouts.app', ['pageTitle'=>'F&B'], ['title'=>'Food & Beverages'])
@push('css')
<style>
    .btn-buy:hover{
        background-color: white;
        color: black;
    }
</style>
@endpush
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
@section('content')
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container">

        <div class="row">
            @foreach($foods as $food)
            <div class="col-lg-3 col-md-6">
                <div class="box" style="margin-top:10%">
                    <!--                    <h3>Free</h3>
                                        <h4><sup>$</sup>0<span> / month</span></h4>-->
                    <ul>
                        <li><img src="assets/img/{{$food['image']}}" alt="" width="200px" height="200px"></li>
                        <li>{{$food['name']}}</li>                     
                    </ul>
                    <div class="btn-wrap">
                        <a href="{{action('\App\Http\Controllers\FoodsController@foodInfo',$food['id'])}}" class="btn-buy">More Details</a>
                    </div>
                </div>
            </div>  
            @endforeach
        </div>
    </div>
</section><!-- End Pricing Section -->
@endsection
