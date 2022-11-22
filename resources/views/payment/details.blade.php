@extends('layouts.app', ['pageTitle'=>'Payment'], ['title'=>'Payment'])

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
@endpush

