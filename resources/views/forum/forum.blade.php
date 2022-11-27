@extends('forum.layouts.app')

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
<div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-sm-0">
            <h5>
                <a href="#" class="text-primary">HELP! My Windows XP machine is down</a>
            </h5>
            <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">54 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
            <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> </div>
        </div>
        <div class="col-md-4 op-7">
            <div class="row text-center op-7">
                <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">256 Threads</span> </div>
                <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">251 Replys</span> </div>
                <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">223 Views</span> </div>
            </div>
        </div>
    </div>
</div>
<div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-sm-0">
            <h5>
                <a href="#" class="text-primary">Bootstrap 4 development in record time with AppStrap Bootstrap 4 Theme</a>
            </h5>
            <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">32 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">AppStrapMaster</a></p>
            <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
        </div>
        <div class="col-md-4 op-7">
            <div class="row text-center op-7">
                <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">245 Threads</span> </div>
                <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">116 Replys</span> </div>
                <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">257 Views</span> </div>
            </div>
        </div>
    </div>
</div>
<div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-sm-0">
            <h5>
                <a href="#" class="text-primary">Bootstrap 4 development in record time with AppStrap Bootstrap 4 Theme</a>
            </h5>
            <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">29 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">Themelize.me</a></p>
            <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Android</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> <a class="text-black mr-2" href="#">#Wordpress</a> <a class="text-black mr-2" href="#">#Drupal</a> </div>
        </div>
        <div class="col-md-4 op-7">
            <div class="row text-center op-7">
                <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">49 Threads</span> </div>
                <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">29 Replys</span> </div>
                <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">170 Views</span> </div>
            </div>
        </div>
    </div>
</div>
<div class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-sm-0">
            <h5>
                <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
            </h5>
            <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">53 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">Themelize.me</a></p>
            <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#iOS</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> </div>
        </div>
        <div class="col-md-4 op-7">
            <div class="row text-center op-7">
                <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">164 Threads</span> </div>
                <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">82 Replys</span> </div>
                <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">240 Views</span> </div>
            </div>
        </div>
    </div>
</div>
<div class="card row-hover pos-relative py-3 px-3 mb-3 border-danger border-top-0 border-right-0 border-bottom-0 rounded-0">
    <div class="row align-items-center">
        <div class="col-md-8 mb-3 mb-sm-0">
            <h5>
                <a href="#" class="text-primary">Custom shortcut or command to launch command in terminal?</a>
            </h5>
            <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">44 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">DanielD</a></p>
            <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#Bootstrap 4</a> </div>
        </div>
        <div class="col-md-4 op-7">
            <div class="row text-center op-7">
                <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">180 Threads</span> </div>
                <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">35 Replys</span> </div>
                <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">44 Views</span> </div>
            </div>
        </div>
    </div>
</div>
@endsection