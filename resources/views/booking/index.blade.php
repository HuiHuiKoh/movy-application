@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@section('content')
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
}

if (!isset($_GET['btn-date'])) {
    $_GET['btn-date'] = $uniqueDate[0] ?? null;
}
?>
<section id="booking">
    @foreach($movies as $movie)
    {{$movieId= $movie->id;}}
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
                <form method="get">
                    <?php for ($i = 0; $i < count($uniqueDay); $i++) { ?>
                        <button class="date-item bg-transparent border-0 " name="btn-date" value="{{$uniqueDate[$i]}}">
                            <a class="text-center text-uppercase showtimes-date">
                                <div>{{$uniqueDay[$i]}}</div>
                                <div>{{$uniqueDate[$i]}}</div>
                            </a>
                        </button>
                    <?php } ?>
                </form>
            </ul>
        </div>

        <div class="mx-4 mt-3 py-4">
            @foreach($cinema as $cin)
            <div class="location mx-3 mt-3 mb-5">
                <h3 class="font-weight-bold">{{ $cin->name }}</h3>
                <form action="/booking/seats">
                    @for ($i = 0; $i < count($showtimes); $i++)
                    @if($showtimes[$i]->cinemaID == $cin->id && Carbon\Carbon::parse($showtimes[$i]->dateTime)->format('d-M') == $_GET['btn-date'])
                    <?php
                    $dateSel = Carbon\Carbon::parse($showtimes[$i]->dateTime)->format('d-M');
                    $timeSel = Carbon\Carbon::parse($showtimes[$i]->dateTime)->format('h:i a');
                    ?>

                    <button class="btn square-btn orange-outline-btn mr-5 mt-4">
                        <span>{{Carbon\Carbon::parse($showtimes[$i]->dateTime)->format('h:i a')}}</span>
                    </button>
                    <?php
//                    session()->put('movieId', $movieId);
//                    session()->put('cin', $cin->id);
//                    session()->put('cin', $dateSel);
//                    session()->put('cin', $timeSel);
                    ?>
                    @endif
                    @endfor
                </form>
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
    $('.date-item')[0].classList.remove('bg-transparent');
    $('.date-item')[0].classList.add('bg-softOrange');
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var urlDate = urlParams.get('btn-date');
    for (var i = 0; i < $('.date-item').length; i++) {
        if ($('.date-item')[i].value === urlDate) {
            $('.date-item')[0].classList.add('bg-transparent');
            $('.date-item')[0].classList.remove('bg-softOrange');
            $('.date-item')[i].classList.remove('bg-transparent');
            $('.date-item')[i].classList.add('bg-softOrange');
        }
    }
</script>
@endpush