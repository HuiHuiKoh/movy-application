@extends('layouts.app', ['pageTitle'=>'Forum'], ['title'=>'Forum'])

@section('content')
<section class="login-block">
    <div class="container">
        <div class="row bg-white m-5 rounded-5">
            <div class="col-md-4 login-sec position-relative px-4 py-5">
                <h3 class="text-center mb-3">Register Now</h3>
                <form class="login-form p-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="">Username</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="">Email Address</label>
                        <input type="email" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="">Password</label>
                        <input type="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-check mt-4">
                        <button type="submit" class="btn orange-btn float-right bg-softOrange">Register</button>
                    </div>

                </form>
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <img class="d-block img-fluid" src="https://img.freepik.com/free-vector/devops-team-abstract-concept-vector-illustration-software-development-team-member-agile-workflow-devops-team-model-it-teamwork-project-management-integrated-practice-abstract-metaphor_335657-2299.jpg">
                    </div>	   
                </div>
            </div>
        </div>
</section>
@endsection
