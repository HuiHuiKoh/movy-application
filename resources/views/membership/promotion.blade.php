@extends('layouts.app', ['pageTitle'=>'Membership'], ['title'=>'Membership'])

@section('content')
<section id="membership">
    <div class="container">
        <h1 class="my-4">Promotions</h1>
        <div class="row">
            @foreach($promotions as $promo)
            <div class="col-lg-3 mb-4">
                <div class="card h-100 bg-black font-white">
                    <a href="#"><img class="card-img-top" height="200" src="{{asset('import/assets/img/'.$promo->image)}}" alt=""></a>
                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="#">{{$promo->title}}</a>
                        </h6>
                        <p class="card-text">{{$promo->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
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

