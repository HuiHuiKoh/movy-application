@extends('layouts.app', ['pageTitle'=>'Membership'], ['title'=>'Membership'])

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif

<section id="membership">
    <div class="container">
        <div class="m-4">
            <h3 class="mt-5 text-center">Member Points and Vouchers</h3>
        </div>
        <div class="p-5">
            <div class="mx-5 font-white mb-5">

                <p class="d-inline" style="font-size: large">Collected Points: 
                    @foreach($members as $member)
                    {{$member->points}}
                    @endforeach
                </p>
                <p class="font-size-normal mt-1 font-italic">*Each time purchase earns points with equal value*</p>
                <form action="{{action('\App\Http\Controllers\MembershipController@points')}}" method="post">
                    @csrf
                    <input type="number" placeholder="How many vouchers do you want to exchange?" class="w-50" name="pointDc">
                    <button type="submit" name="btnSubmit" class="btn orange-btn d-inline">Exchange Voucher</button>
                </form>
            </div>

            <div class="ml-5 mt-3 font-white"><p style="font-size: large">Collected Vouchers: </p>
                <div class="row font-white justify-content-center">
                    @if($memVcs == null)
                    <h6>You have no collected voucher</h6>
                    @else
                    @foreach($memVcs as $vc)
                    <div class="row">
                        <div class="col-md-5 border p-1">
                            <a href="#">
                                <p class="align-middle">{{$vc->title}}</p>
                            </a>
                        </div>
                        <div class="col-md-2 border p-4">
                            <h6>{{$vc->code}}</h6>
                            @if($vc->redemption_date!=null)
                            <p>Redeemed</p>
                            @else
                            <p>Active</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
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

