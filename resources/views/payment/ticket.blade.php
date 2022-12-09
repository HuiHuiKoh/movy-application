@extends('layouts.app', ['pageTitle'=>'Print Ticket'], ['title'=>'Ticket'])

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<div class="container mt-4 p-4">
    <div class="row">
        @if($tickets != null)
        @foreach($tickets as $ticket)
        @foreach($showtimes as $showtime)
        @foreach($seats as $seat)
        <div class="card col-md-6">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        {!! QrCode::size(100)->generate('
                        Movie: '.$ticket->name.', 
                        Cinema: '.$showtime->name.',
                        Hall: '.$showtime->hall.', 
                        Date: '.Carbon\Carbon::parse($showtime->dateTime)->format('d M Y').',
                        Time: '.Carbon\Carbon::parse($showtime->dateTime)->format('h:i a').',
                        Seat: '.$seat->row.$seat->number.',
                        '); !!}
                    </div>
                    <div class="col-md-7 font-size-small">
                        Movie: {{$ticket->name}}<br> 
                        Cinema: {{$showtime->name}}<br> 
                        Hall: {{$showtime->hall}}<br> 
                        Date: {{Carbon\Carbon::parse($showtime->dateTime)->format('d M Y')}}<br> 
                        Time: {{Carbon\Carbon::parse($showtime->dateTime)->format('h:i a')}}<br> 
                        Seat: {{$seat->row.$seat->number}}
                    </div>
                    <div class="col-md-2 text-right">
                        <img src="{{asset('import/assets/img/logo.png')}}" width="50">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
        @endforeach
        @endif
    </div>
</div>
@endsection