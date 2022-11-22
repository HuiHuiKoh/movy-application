@extends('layouts.app', ['pageTitle'=>'Payment'], ['title'=>'Payment'])

@push('css')
<style>
    .close{
        font-size: 21px;
        cursor: pointer
    }
    .modal-body{
        height: 450px
    }
    .nav-tabs{
        border:none !important
    }
    .nav-tabs .nav-link.active{
        color: #495057;
        background-color: var(--white);
        border-top: 3px solid blue !important
    }
    .nav-tabs .nav-link{
        margin-bottom: -1px;
        border: 1px solid transparent;
        border-top-left-radius: 0rem;
        border-top-right-radius: 0rem;
        border-top: 3px solid #eee;
        font-size: 20px
    }
    .nav-tabs .nav-link:hover{
        border-color: #e9ecef #ffffff #ffffff
    }
    .nav-tabs{
        display: table !important;
        width: 100%
    }
    .nav-item{
        display: table-cell
    }
    .form-control{
        border-bottom: 1px solid #eee !important;
        border:none;
        font-weight: 600
    }
    .form-control:focus{
        color: #495057;
        background-color: #fff;
        border-color: #8bbafe;
        outline: 0;
        box-shadow: none
    }
    .inputbox{
        position: relative;
        margin-bottom: 20px;
        width: 100%
    }
    .inputbox span{
        position: absolute;
        top:7px;
        left: 11px;
        transition: 0.5s
    }
    .inputbox i{
        position: absolute;
        top: 13px;
        right: 8px;
        transition: 0.5s;
        color: #3F51B5
    }
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button{
        -webkit-appearance: none;
        margin: 0
    }
    .inputbox input:focus~span{
        transform: translateX(-0px) translateY(-15px);
        font-size: 12px
    }
    .inputbox input:valid~span{
        transform: translateX(-0px) translateY(-15px);
        font-size: 12px
    }
    .pay button{
        height: 47px;
        border-radius: 37px
    }
</style>
@endpush

@section('content')
<section id="payment">
    <div class="text-center mt-5"><h1>Payment Successful</h1></div>
    <div class="container px-5 mb-3 w-75 bg-black text-left">
        <div class="row">
            <div class="card border-0 rounded-0 bg-black">
                <div class="card-body p-4 font-white">
                    <div class="mt-3">
                        <p>Movie: Beauty and the Beast</p>
                        <p>Cinema: MOVY 1Utama</p>
                        <p>Hall: 02</p>
                        <p>Date: 22 NOV 2022</p>
                        <p>Time: 9:30 PM</p>
                        <p>Seats: H1</p>
                        <p>F&B: -</p>
                        <p>Total: RM 20.00</p>
                        <p>Transaction Date & Time: </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col text-center">
        <button type="button" onclick="window.location.href ='{{asset('home')}}'" class="btn orange-btn mb-5">Back to Homepage</button>
        <button type="button" class="btn orange-btn mb-5" data-toggle="modal" data-target="#staticBackdrop">Print Ticket</button>
    </div>  

</section>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endpush

