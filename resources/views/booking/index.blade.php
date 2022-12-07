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

if (isset($_POST['submit'])) {
    if (!isset($_POST['cinema']) && !isset($_POST['cinema'])) {
        echo '<script>alert("Please select cinema and time")</script>';
    }
}
?>
<section id="booking">
    @foreach($movies as $movie)
    <div class="text-left bg-black py-4 font-white">
        <div class="row">
            <img class="rounded d-inline mx-4 col col-lg-2" width="150" height="230" 
                 src="{{asset('assets/img/'.$movie->image)}}" />
            <div class="position-relative col-sm">
                <h3 class="font-weight-bold">{{ $movie->name }}</h3>
                <div class="mt-2">{{ $movie->duration }}</div>
                <div class="mt-2">{{ $movie->type }}</div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="container mb-5">
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
            <form action="/booking/seats/store" method="post">
                @csrf
                <select id="selectCinema" name="cinema" class="form-select w-25 mx-4 my-4" aria-label="Default select example">
                    <option disabled selected>Select Cinema</option>
                    @foreach($cinema as $cin)
                    <option value="{{ $cin->id }}">{{ $cin->name }}</option>
                    @endforeach
                </select>
                @foreach($cinema as $cin)
                <select name="datetime" class="selectTime form-select w-25 mx-4 my-4 d-none" aria-label="Default select example">
                    <option disabled selected>Select Time</option>
                    @for ($i = 0; $i < count($showtimes); $i++)
                    @if($showtimes[$i]->cinemaID == $cin->id && Carbon\Carbon::parse($showtimes[$i]->dateTime)->format('d-M') == $_GET['btn-date'])
                    <option value="{{$showtimes[$i]->dateTime}}">
                        {{Carbon\Carbon::parse($showtimes[$i]->dateTime)->format('h:i a')}}</option>
                    @endif
                    @endfor
                </select>
                @foreach($movies as $movie)
                <input type="hidden" name="movie" value="{{$movie->id}}">
                @endforeach
                @endforeach
                <button type="submit" name="submit" class="continue-btn btn square-btn orange-outline-btn m-4">
                    <span>Continue</span>
                </button>
            </form>
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
//    Add active state to the active date button
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
<script>
//    Dropdown list onchange
    let times = $(".selectTime");
    $(document).ready(function () {
        $("#selectCinema").change(function () {
            for (var i = 1; i <= $("#selectCinema option").length - 1; i++) {
                times[i - 1].classList.add('d-none');
                if ($('#selectCinema option:selected').val() === i.toString()) {
                    times[i - 1].classList.remove('d-none');
                }
            }

        });
    });
</script>
@endpush