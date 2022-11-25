@extends('layouts.app', ['pageTitle'=>'Membership'], ['title'=>'Membership'])

@section('content')
<section id="membership">
    <div class="container">
        <div class="m-4">
            <h3 class="my-5 text-center">Member Points and Vouchers</h3>
        </div>
        <div class="">
            <div class="mx-5 font-white">
                <p class="d-inline">Collected Points: </p>
                <h6 class="d-inline">53</h6>
            </div>
            <div class="mx-5 mt-3 font-white">
                <div class="row font-white my-5 justify-content-center">
                    <p>Collected Vouchers: </p>
                    <div class="col-md-7 border p-1">
                        <a href="#">
                            <p class="align-middle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                        </a>
                    </div>
                    <div class="col-md-2 border p-4">
                        <h6>Voucher blaaaaaaaa</h6>
                    </div>
                </div>
                <div class="row font-white my-5 justify-content-center">
                    <div class="col-md-7 border p-1">
                        <a href="#">
                            <p class="align-middle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                        </a>
                    </div>
                    <div class="col-md-2 border p-4">
                        <h6>Voucher blaaaaaaaa</h6>
                    </div>
                </div>
            </div>
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

