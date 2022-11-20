@extends('layouts.app', ['pageTitle'=>'F&B'], ['title'=>'Food & Beverages'])
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
            @foreach($foods as $food)
            <div class="col-lg-3 col-md-6">
                <div class="box">
<!--                    <h3>Free</h3>
                    <h4><sup>$</sup>0<span> / month</span></h4>-->
                    <ul>
                        <li><img src="import/assets/img/{{$food['image']}}" alt="" width="200px" height="200px"></li>
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
