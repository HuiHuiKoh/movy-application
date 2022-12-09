@extends('forum.layouts.auth')

@section('forum')
<div class="row text-left mb-5">
    <div class="col-lg-6 mb-3 mb-sm-0">
        <select class="form-select form-control bg-white" data-toggle="select" tabindex="-98">
            <option> Categories </option>
            <option> Learn </option>
            <option> Share </option>
            <option> Build </option>
        </select>
    </div>
    <div class="col-lg-6 text-lg-right">
        <select class="form-select form-control bg-white ml-auto" data-toggle="select" tabindex="-98">
            <option> Filter by </option>
            <option> Threads </option>
            <option> Replys </option>
            <option> Views </option>
        </select>
    </div>
</div>
<div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-sm-0">
            <h5>
                <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
            </h5>
            <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">20 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">KenyeW</a></p>
            <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
        </div>
        <div class="col-md-4 op-7">
            <div class="row text-center op-7">
                <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">141 Threads</span> </div>
                <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">122 Replys</span> </div>
                <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">290 Views</span> </div>
            </div>
        </div>
    </div>
</div>
@endsection