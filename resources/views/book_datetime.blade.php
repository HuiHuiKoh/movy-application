@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@section('content')
<section id="homepage" class="pricing">
    <div class="container">
        <div>
            <button type="button" class="btn orange-outline-btn px-5 py-1 mx-2">
                <div class="text-uppercase">Today</div>
                <div class="text-uppercase">20-nov</div>
            </button>
            <button type="button" class="btn orange-outline-btn px-5 py-1 mx-2">
                <div class="text-uppercase">Sun</div>
                <div class="text-uppercase">21-nov</div>
            </button>
            <button type="button" class="btn orange-outline-btn px-5 py-1 mx-2">
                <div class="text-uppercase">Mon</div>
                <div class="text-uppercase">22-nov</div>
            </button>
        </div>
        <p>
            <button
                class="btn btn-primary"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#collapseWidthExample"
                aria-expanded="false"
                aria-controls="collapseWidthExample"
                >
                Toggle width collapse
            </button>
        </p>
        <div style="min-height: 120px;">
            <div class="collapse collapse-horizontal" id="collapseWidthExample" >
                <div style="width: 300px;">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                    squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                    sapiente ea proident.
                </div>
            </div>
        </div>

    </div>
</section>
@endsection