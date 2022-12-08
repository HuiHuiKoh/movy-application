@extends('layouts.app', ['pageTitle'=>'Membership'], ['title'=>'Membership'])

@section('content')
<section id="membership">
    <div class="container">
        <h1 class="my-5 text-center">Vouchers</h1>
        @foreach($vouchers as $vc)
        <div class="row font-white my-5 justify-content-center px-5">
            <div class="col-md-2 border text-center">
                <img width="80" src="{{asset('import/assets/img/logo.png')}}">
            </div>
            <div class="col-md-7 border">
                <h6 class="align-middle text-left d-inline">{{$vc->title}}</h6>
                <p class="mt-2 font-size-normal"><i class="bi bi-calendar"></i> Expired Date: {{$vc->exp_date}}</p>
            </div>
            <div class="col-md-3 border p-2 text-center">
                <h6>{{$vc->code}}</h6>
                <button class="btn orange-btn ml-0">Collect Voucher</button>
                <!--<button class="btn btn-secondary ml-0" disabled="true">Collected</button>-->
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
@endpush

