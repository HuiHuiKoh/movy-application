@extends('layouts.app', ['pageTitle'=>'MOVY'],['title'=>'Purchase History'])
@push('css')
@endpush

<link rel="stylesheet" href="{{asset('assets\css\purchaseHistory.css')}}">

<!------ Include the above in your HEAD tag ---------->

@section('content')
<div class="container" style="margin-top: 3%;">
    
    <div style="margin-top: 3%;">
        <div>
            <table class="table" style="width:100%;">
                <thead>
                    <tr>                       
                        <th width="15%">Order ID</th>                       
                        <th width="15%">Date</th>                       
                        <th width="15%">Amount</th>                       
                        <th width="20%"> Payment Method</th>                                                                                     
                    </tr>
                </thead>
                @foreach($payments as $purchase)
                <tbody>                   
                    <tr>                   
                        <td width="5%"><u><a href="{{action('\App\Http\Controllers\HistoryController@details',$purchase->paymentID)}}" value="{{$purchase->paymentID}}" name="orderID" id="orderID">#{{$purchase->paymentID}}</a></u></td>                    
                        <td width="20%">{{$purchase->created_at}}</td>                       
                        <td width="15%">RM {{$purchase->amount}}</td>                      
                        <td width="15%">{{$purchase->method}}</td>                       
                    </tr>                   
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    
</div>

@endsection
