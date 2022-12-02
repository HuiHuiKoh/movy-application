@extends('layouts.app', ['pageTitle'=>'MOVY'],['title'=>'Purchase History'])
@push('css')
@endpush

<link rel="stylesheet" href="{{asset('assets\css\purchaseHistory.css')}}">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div class="container" style="margin-top: 3%;">
    @section('content')
    <div style="margin-top: 3%;">
        <div class="col-sm-12 col-md-10 col-md-offset-1" >
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
                        
                        <td width="5%">{{$purchase->paymentID}}</td>
                       
                        <td width="20%">{{$purchase->created_at}}</td>
                        
                        <td width="15%">RM {{$purchase->amount}}</td>
                       
                        <td width="15%">{{$purchase->method}}</td>
                    </tr>
                    
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    @endsection
</div>
