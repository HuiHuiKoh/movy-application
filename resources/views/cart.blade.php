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

                <div class="row main align-items-center">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>&nbsp; Item</th>
                                <th>Quantity</th>
                                <th>&emsp;Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($foods as $item)                          
                            <tr>                             
                                <td></td>
                                <td><img class="img-fluid" src="assets/img/{{$item->image}}"></td>
                                <td><div class="col">
                                        <div class="row">{{$item->name}}</div>
                                    </div>
                                </td>
                                <td><div class="col">&emsp;{{$item->quantity}}</div></td>
                                <td><div class="col">RM {{$item->price}}</div></td>
<!--                                <td>
                                    <input name="_method" type="hidden" value="DELETE">
                                    <a type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')" style="margin-top: 0" href="destroy/{{$item->cartID}}">Delete</a>
                                </td>-->
                                <td><form method="POST" action="{{action('\App\Http\Controllers\CartController@destroy',$item->cartID)}}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?') " style="margin-top: 0">Delete</button>
                                    </form></td>
                            </tr>          
                            @php $total += $item->price * $item->quantity; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="back-to-shop"><a href="#" style="color:#2A2A2A">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div><h5><b style="color:#2A2A2A">Summary</b></h5></div>
            <hr>
            <div class="row">
                <div class="col">TOTAL</div>
                <div class="col text-right">RM {{$total}}</div>
            </div>
            <form>

                <p></p>
                <p>GIVE CODE</p>
                <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">RM {{$total}}</div>
            </div>
            <button class="btn">CHECKOUT</button>
        </div>
    </div>


</div>
