@extends('layouts.app', ['pageTitle'=>'Movy Home'])
@push('css')
<style>
    @import url(https://fonts.googleapis.com/css?family=Calibri:400,300,700);body{
        vertical-align: middle;
        display: flex;
        font-family: 'Calibri', sans-serif !important;
        background-color:#eee
    }
    .mt-100{
        margin-top:100px
    }
    .product-wrapper, .product-img{
        overflow: hidden;
        position: relative
    }
    .mb-45{
        margin-bottom: 45px
    }
    .product-action{
        bottom: 0px;
        left: 0;
        opacity: 0;
        position: absolute;
        right: 0;
        text-align: center;
        transition: all 0.6s ease 0s
    }
    .product-wrapper{
        border-radius: 10px
    }
    .product-img >span{
        background-color: #fff;
        box-shadow: 0 0 8px 1.7px rgba(0, 0, 0, 0.06);
        color: #333;
        display: inline-block;
        font-size: 12px;
        font-weight: 500;
        left: 20px;
        letter-spacing: 1px;
        padding: 3px 12px;
        position: absolute;
        text-align: center;
        text-transform: uppercase;
        top: 20px
    }
    .product-action-style{
        background-color: #fff;
        box-shadow: 0 0 8px 1.7px rgba(0, 0, 0, 0.06);
        display: inline-block;
        padding: 16px 2px 12px
    }
    .product-action-style >a{
        color: #979797;
        line-height: 1;
        padding: 0 21px;
        position: relative
    }
    .product-action-style >a.action-plus{
        font-size: 18px
    }
    .product-wrapper:hover .product-action{
        bottom: 20px;
        opacity: 1
    }
</style>
@endpush

@section('content')
<!-- ======= Hero Section ======= -->
<div id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
        <!--<h1>Get out of the role,<br>but stay in the moment</h1>-->
    </div>
</div>
<div>
    <a href="" class="btn-get-started ms-5 mt-5">Check Booking</a>
</div>
<!-- ======= Pricing Section ======= -->
<section id="homepage" class="pricing">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="box">
                    <h3>Free</h3>
                    <h4><sup>$</sup>0<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li class="na">Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                <div class="box featured">
                    <h3>Business</h3>
                    <h4><sup>$</sup>19<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                <div class="box">
                    <h3>Developer</h3>
                    <h4><sup>$</sup>29<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                <div class="box">
                    <span class="advanced">Advanced</span>
                    <h3>Ultimate</h3>
                    <h4><sup>$</sup>49<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Pricing Section -->
@endsection

