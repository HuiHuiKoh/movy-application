@extends('layouts.app', ['pageTitle'=>'F&B'], ['title'=>'Food & Beverages'])
@push('css')
<style>

</style>
@endpush

@section('content')
<!-- ======= Courses Section ======= -->
<section id="courses" class="courses">
    <div class="container">

        <div class="row">

            @foreach($foods as $food)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="course-item">
                    <img src="import/assets/img/{{$food['image']}}" class="img-fluid" alt="..." width="200px" height="200px" style="margin-top: 5%; margin-bottom: 5%;margin-left:25%; margin-right: 25%">
                    <div class="course-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
<!--                            <h4></h4>-->
                        </div>
                        <p style="color:white;" class="price">{{$food['name']}}</p>
                        <p style="color:white;">{{$food['price']}}</p>
                        <p style="color:white;">{{$food['description']}}</p>

                       
                    </div>
                    <h3><a href="" style="font-size: 0.7em; margin-left: 10%">ADD TO CART</a></h3>
                </div>

            </div> <!-- End Course Item-->      
            @endforeach
        </div>

    </div>
</section><!-- End Courses Section -->
@endsection