@extends('layouts.app', ['pageTitle'=>'MOVY'],['title'=>'Showtimes'])
@push('css')
@endpush

<link rel="stylesheet" href="{{asset('assets\css\cart.css')}}">
<div class="card" style="margin-top: 10%">

    <div class="row">

        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col"><h4><b>MOVY Cart</b></h4></div>
                    <div class="col align-self-center text-right text-muted">3 items</div>
                </div>
            </div>    
            
            <div class="row border-top border-bottom">
                @foreach($foods as $item)
                <div class="row main align-items-center">
                    
                    <div class="col-2"><img class="img-fluid" src="assets/img/{{$item->image}}"></div>
                    <div class="col">
                        <div class="row text-muted">Items</div>
                        <div class="row">{{$item->name}}</div>
                    </div>

                    <div class="col">{{$item->quantity}}</div>

                    <div class="col">RM {{$item->price}} <span class="close">&#10005;</span></div>
                    
                </div>
                @endforeach
            </div>
            

            <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div><h5><b style="color:#2A2A2A">Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col">TOTAL</div>
                <div class="col text-right">&euro; 132.00</div>
            </div>
            <form>
                <p>SHIPPING</p>
                <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                <p></p>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; 137.00</div>
            </div>
            <button class="btn">CHECKOUT</button>
        </div>

    </div>


</div>
