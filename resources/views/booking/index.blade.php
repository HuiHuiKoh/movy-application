@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@section('content')
<section id="booking">
    @foreach($movies as $movie)
    <div class="text-center bg-black py-4 font-white">
        <img class="rounded" width="200" height="300" 
             src="{{asset('assets/img/'.$movie->image)}}" />
        <div>
            {{ $movie->name }}
        </div>
        <div>
            {{ $movie->duration }}
        </div>
        <div>
            {{ $movie->type }}
        </div>
    </div>
    @endforeach
    <div class="container">
        <div class="mt-5">
            <ul class="booking-dates text-left">
                <?php
                $uniqueDay = [];
                foreach ($showtimes as $show) {
                    $day = Carbon\Carbon::parse($show->dateTime)->format('D');
                    if (!in_array($day, $uniqueDay)) {
                        array_push($uniqueDay, $day);
                    }
                }
                $uniqueDate = [];
                foreach ($showtimes as $show) {
                    $date = Carbon\Carbon::parse($show->dateTime)->format('d-M');
                    if (!in_array($date, $uniqueDate)) {
                        array_push($uniqueDate, $date);
                    }
//                    var_dump($uniqueDate);
//                    echo "<script>console.log(" . $uniqueDate . ")</script>";
                }
                ?>
                <?php for ($i = 0; $i < count($uniqueDay); $i++) { ?>
                    <button class="date-item bg-transparent border-0">
                        <a class="pr-4 text-center text-uppercase showtimes-date">
                            <div>{{$uniqueDay[$i]}}</div>
                            <div>{{$uniqueDate[$i]}}</div>
                        </a>
                    </button>
                <?php } ?>
            </ul>
        </div>



        <div class="mx-4 mt-5 py-4">
            <!--            @foreach($showtimes as $show)
                        <div class="location mx-3 mt-3 mb-5">
            
                            <h3 class="font-weight-bold">{{ $cinema }}</h3>
                            <button class="btn square-btn orange-outline-btn mr-5 mt-4"><span>{{Carbon\Carbon::parse($show->dateTime)->format('h:i a')}}</span></button>
            
                        </div>
                        @endforeach-->
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
</section>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
<script>
//    Add active state to the current clicked date
let dates = $('.showtimes-date');
dates[0].classList.add('active-nav');
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
<script>
    function passVar(var date){
        window.location.href="{{action('\App\Http\Controllers\BookingController@index','1', 'hi')}}";
    }
</script>
@endpush