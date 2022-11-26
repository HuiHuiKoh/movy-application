@extends('layouts.app', ['pageTitle'=>'Forum'], ['title'=>'Forum'])

@section('content')
<section class="login-block">
    <div class="container">
        <div class="row bg-white m-5 rounded-5">
            <div class="col-md-4 login-sec position-relative px-4 py-5">
                <h3 class="text-center mb-3">Login Now</h3>
                <form class="login-form p-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="">Username</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="">Password</label>
                        <input type="password" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <div class="mt-4">
                            <a class="btn btn-link text-left p-0" href="">
                                Forgot Your Password?
                            </a>
                            <button type="submit" class="btn orange-btn ml-3">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <img class="p-4 d-block img-fluid" src="https://img.freepik.com/free-vector/tablet-with-users-communicating-speech-bubbles-global-internet-communication-social-media-network-technology-chat-message-forum-concept-vector-isolated-illustration_335657-1987.jpg">
                    </div>	   
                </div>
            </div>
        </div>
</section>
@endsection
