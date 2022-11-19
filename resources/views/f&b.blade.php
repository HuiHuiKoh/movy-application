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
<<<<<<< Updated upstream

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="{{ asset('import/assets/img/trainers/trainer-1.jpg') }}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Web Development</h4>
                  <p class="price">$169</p>
                </div>

                <h3><a href="">Website Design</a></h3>
                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="{{ asset('import/assets/img/trainers/trainer-1.jpg') }}" class="img-fluid" alt="">
                    <span>Antonio</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;50
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="course-item">
              <img src="{{ asset('import/assets/img/trainers/trainer-1.jpg') }}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Marketing</h4>
                  <p class="price">$250</p>
                </div>

                <h3><a href="">Search Engine Optimization</a></h3>
                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="{{ asset('import/assets/img/trainers/trainer-1.jpg') }}" class="img-fluid" alt="">
                    <span>Lana</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;42
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="course-item">
              <img src="{{ asset('import/assets/img/trainers/trainer-1.jpg') }}" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>Content</h4>
                  <p class="price">$180</p>
                </div>

                <h3><a href="">Copywriting</a></h3>
                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="{{ asset('import/assets/img/trainers/trainer-1.jpg') }}" class="img-fluid" alt="">
                    <span>Brandon</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;20
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;85
                  </div>
=======
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
>>>>>>> Stashed changes
                </div>

            </div> <!-- End Course Item-->      
            @endforeach
        </div>

    </div>
</section><!-- End Courses Section -->
@endsection