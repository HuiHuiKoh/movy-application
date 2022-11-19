@extends('layouts.app', ['pageTitle'=>'Showtimes'], ['title'=>'Showtimes'])
@push('css')
<style>
    .btn-buy:hover{
        background-color: white;
        color: black;
    }
</style>
@endpush

@section('content')
<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
    <div class="container">

        <div class="row">
            @foreach($movies as $shows)
            <div class="col-lg-3 col-md-6">
                <div class="box">
<!--                    <h3>Free</h3>
                    <h4><sup>$</sup>0<span> / month</span></h4>-->
                    <ul>
                        <li><img src="import/assets/img/{{$shows['image']}}" alt="" width="70%" height="70%"></li>
                        <li>{{$shows['name']}}</li>                     
                    </ul>
                    <div class="btn-wrap">
                        <a href="{{action('\App\Http\Controllers\MoviesController@moviesDetails',$shows['id'])}}" class="btn-buy">More Details</a>
                    </div>
                </div>
            </div>  
            @endforeach
        </div>

    </div>
</section><!-- End Pricing Section -->
@endsection