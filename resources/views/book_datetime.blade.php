@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@push('css')
<style>

</style>
@endpush

@section('content')
    <div class="text-center bg-black py-4">
        <img class="rounded" width="200" height="300" 
             src="https://bst.icons8.com/wp-content/themes/icons8/app/uploads/2019/05/film-poster-graphic-design.jpg" />
        <div class="font-white">
            Beauty and the Beast
        </div>
        <div class="font-white">
            120 minutes
        </div>
    </div>
    <div class="container">
        <div class="mt-5">
            <ul class="booking-dates text-left">
                <li class="date-item"><a class="pr-4 text-center text-uppercase active-nav" href=""><div>Today</div><div>20-nov</div></a></li>
                <li class="date-item"><a class="pr-4 text-center text-uppercase"><div>Mon</div><div>21-nov</div></a></li>
                <li class="date-item"><a class="pr-4 text-center text-uppercase"><div>Tue</div><div>22-nov</div></a></li>
                <li class="date-item"><a class="pr-4 text-center text-uppercase"><div>Wed</div><div>23-nov</div></a></li>
                <li class="date-item"><a class="pr-4 text-center text-uppercase"><div>Thurs</div><div>24-nov</div></a></li>
                <li class="date-item"><a class="pr-4 text-center text-uppercase"><div>Fri</div><div>25-nov</div></a></li>
            </ul>
        </div>
        <div class="mx-4 mt-5 py-4">
            <div class="location mx-3 mt-3 mb-5">
                <h3 class="font-weight-bold">Movy Bukit Tinggi</h3>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>8:30 a.m.</span></button>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>10:30 a.m.</span></button>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>12:30 a.m.</span></button>
            </div>
            <div class="location mx-3 mt-3 mb-5">
                <h3 class="font-weight-bold">Movy 1 Utama</h3>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>8:30 a.m.</span></button>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>10:30 a.m.</span></button>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>12:30 a.m.</span></button>
            </div>
            <div class="location mx-3 mt-3 mb-5">
                <h3 class="font-weight-bold">Movy Rawang</h3>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>8:30 a.m.</span></button>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>10:30 a.m.</span></button>
                <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>12:30 a.m.</span></button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
<script>
//    Add active state to the current clicked date
    var dates = $(".date-item a");
    for (var i = 0; i < dates.length; i++) {
        dates[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active-nav");
            current[0].className = current[0].className.replace(" active-nav", "");
            this.className += " active-nav";
        });
    }
</script>
<script>
//    Remove horizontal line for the last element
    for (i = 0; i < $('.location').length; i++) {
        var hr = document.createElement('hr');
        if (i !== ($('.location').length - 1)) {
            $('.location')[i].after(hr);
        }
    }
</script>
@endpush