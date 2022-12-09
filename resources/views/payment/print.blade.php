@extends('layouts.app', ['pageTitle'=>'Payment'], ['title'=>'Payment'])

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h2>Simple QR Code</h2>
        </div>
        <div class="card-body">
            {!! QrCode::size(250)->generate('https://www.google.com/'); !!}
        </div>
    </div>

<!--    <div class="card">
        <div class="card-header">
            <h2>Color QR Code</h2>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
        </div>
    </div>-->

</div>
@endsection