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
            @php if($details != null){ @endphp
            <table class="table" style="width:100%;">
                <h4 style="text-align: center; color: white; margin-top: 2%">Movies</h4>
                <thead>
                    <tr>                       
                        <th width="15%"></th>                       
                        <th width="15%">Movies</th>                       
                        <th width="15%">Date</th>                       
                        <th width="20%"> Venue</th>                
                        <th width="20%"> Total Amount</th>  
                    </tr>
                </thead>
                @foreach($details as $order)
                <tbody>                   
                    <tr>                   
                        <td width="5%"><img src="/assets/img/{{$order->image}}" width="50%" height="50%"></td>                    
                        <td width="20%">{{$order->name}}</td>                       
                        <td width="15%">{{$order->dateTime}}</td>                      
                        <td width="15%">{{$order->cinemaName}}</td>   
                        <td width="10%">RM {{$order->ticketsAmount}}</td> 
                    </tr>                   
                </tbody>
                @endforeach
            </table>
            @php } @endphp

            @php if($foods != null){ @endphp
            <table class="table" style="width:100%; ">
                <h4 style="text-align: center; color: white; margin-top: 5%">F&B</h4>
                <thead>
                    <tr>                       
                        <th width="15%"></th>                       
                        <th width="15%">Food and Beverages</th>                       
                        <th width="15%"></th>        
                        <th width="15%"></th>  
                        <th width="20%"> Total Amount</th>                                                                                     
                    </tr>
                </thead>

                @foreach($foods as $food)
                <tbody>                   
                    <tr>                   
                        <td width="5%"><img src="/assets/img/{{$food->image}}" width="50%" height="50%"></td>                    
                        <td width="20%">{{$food->name}}</td>                       
                        <td width="15%"></td>      
                        <td width="15%"></td>    
                        <td width="15%">RM {{$food->foodsAmount}}</td>                       
                    </tr>                   
                </tbody>
                @endforeach
            </table>
            @php } @endphp
        </div>
    </div>

</div>

@endsection
