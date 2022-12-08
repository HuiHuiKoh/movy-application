@extends('layouts.app', ['pageTitle'=>'Payment'], ['title'=>'Payment'])

@section('content')
<section id="payment">
    <div class="text-center mt-5"><h1>Payment Successful</h1></div>
    <div class="container px-5 my-3 w-75 bg-black text-left">
        <div class="row">
            <div class="card border-0 rounded-0 bg-black">
                <div class="card-body p-4 font-white">
                    <div class="mt-3">
                        @if($tickets!=null)
                        <div class="row"><div class="col">Movie: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                @foreach($tickets as $ticket)
                                <p>{{$ticket->name}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row"><div class="col">Cinema: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                @foreach($showtimes as $show)
                                <p>{{$show->name}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row"><div class="col">Hall: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                @foreach($showtimes as $show)
                                <p>{{$show->hall}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row"><div class="col">Date: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                @foreach($showtimes as $show)
                                <p>{{Carbon\Carbon::parse($show->dateTime)->format('d M Y')}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row"><div class="col">Time: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                @foreach($showtimes as $show)
                                <p>{{Carbon\Carbon::parse($show->dateTime)->format('h:i a')}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row"><div class="col">Seat: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                <p>@foreach($seats as $seat)
                                    {{$seat->row}}{{$seat->number}}
                                    @endforeach</p>
                            </div>
                        </div>
                        @endif
                        @if($foods!=null)
                        <div class="row"><div class="col">F&B: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                <p>@foreach($foods as $food)
                                    {{$food->name}}
                                    @endforeach</p>
                            </div>
                        </div>
                        @endif
                        <div class="row"><div class="col">Total: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                @foreach($payments as $payment)
                                <p>RM {{$payment->amount}}.00</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="row"><div class="col">Transaction: </div>
                            <div class="col col-sm-10 font-weight-bold">
                                @foreach($payments as $payment)
                                <p>{{$payment->created_at}}</p>
                                @endforeach
                            </div>
                        </div>
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

