@extends('layouts.app', ['pageTitle'=>'MOVY'],['title'=>'Purchase History'])
@push('css')
@endpush

<link rel="stylesheet" href="{{asset('assets\css\purchaseHistory.css')}}">
<link rel="stylesheet" href="{{asset('assets\css\showtimes.css')}}">
<button onclick="scrollToTopFunction()" id="topButton" title="Go to top">Top</button>

<!------ Include the above in your HEAD tag ---------->
<script>
    var topbutton = document.getElementById("topButton");
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            topbutton.style.display = "block";
        } else {
            topbutton.style.display = "none";
        }
    }
    function scrollToTopFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
@section('content')

<div class="container" style="margin-top: 3%;">

    <div style="margin-top: 3%;">
        <div>

            <table class="table" style="width:100%;">
                @foreach($details as $order)
                <tbody>                   
                    <tr>                   
                        <td width="5%"><img src="/assets/img/{{$order->image}}" width="100" height="140"></td>                    
                        <td width="20%">{{$order->name}}</td>                       
                        <td width="15%">{{$order->dateTime}}</td>                      
                        <td width="15%">{{$order->cinemaName}}</td>   
                        <td width="10%">RM {{$order->ticketsAmount}}</td> 
                    </tr>                   
                </tbody>
                @endforeach
            </table>

            <table class="table" style="width:100%; ">

                @foreach($foods as $food)
                <tbody>                   
                    <tr>                   
                        <td width="5%"><img src="/assets/img/{{$food->image}}" width="100" height="100"></td>                    
                        <td width="20%">{{$food->name}}</td>                       
                        <td width="15%"></td>      
                        <td width="15%"></td>    
                        <td width="15%">RM {{$food->foodsAmount}}</td>                       
                    </tr>                   
                </tbody>
                @endforeach
            </table>

        </div>
    </div>

</div>

@endsection
