@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@push('css')
<style>
    #seating-plan {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .seat-container {
        perspective: 1000px;
        margin-bottom: 30px;
    }
    .seat {
        background-color: rgb(102, 102, 102);
        height: 12px;
        width: 15px;
        border-radius: 8px 8px 0 0;
        margin: 10px 5px;
    }
    .seat.selected {
        background-color: var(--strongLimeGreen);
    }
    .seat.occupied {
        background-color: var(--red);
    }
    .seat.single {
        background-color: var(--lightBlue);
    }
    .seat.twin {
        background-color: var(--yellow);
    }
    .seat:not(.occupied):hover {
        cursor: pointer;
        transform: scale(1.3);
    }
    .showcase .seat:not(.occupied):hover {
        cursor: default;
        transform: scale(1);
    }
    .showcase {
        background-color: rgba(0, 0, 0, 0.15);
        padding: 5px 10px;
        border-radius: 6px;
        color: #777;
        list-style-type: none;
        display: flex;
        justify-content: space-between;
    }
    .showcase li {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .showcase li small {
        margin-left: 2px;
    }
    .seat-container.row {
        display: flex;
    }
    .screen {
        background-color: #fff;
        height: 70px;
        width: 100%;
        margin: 15px 0;
        transform: rotateX(-45deg);
        box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
    }
</style>
@endpush

@section('content')
<section id="seats" class="align-items-center">
    <div class="text-center bg-black py-4 font-white">
        <h5>Beauty and the Beast</h5>
        <h5>120 minutes</h5>
        <div class="movie-details text-uppercase mt-4">
            <h6 class="d-inline mx-2">Movie 1Utama</h6>|
            <h6 class="d-inline mx-2">Hall 02</h6>&nbsp;|
            <h6 class="d-inline mx-2">22 Nov 2022</h6>&nbsp;|
            <h6 class="d-inline mx-2">9:30 pm</h6>
        </div>
    </div>
    <div id="seating-plan" class="my-5">
        <div class="showcase">
            <li class="mx-4">
                <div class="seat"></div>
                <small>Unavailable</small>
            </li>
            <li class="mx-4">
                <div class="seat selected"></div>
                <small>Selected</small>
            </li>
            <li class="mx-4">
                <div class="seat occupied"></div>
                <small>Occupied</small>
            </li>
            <li class="mx-4">
                <div class="seat twin"></div>
                <div class="seat twin"></div>
                <small>Twin</small>
            </li>
            <li class="mx-4">
                <div class="seat single"></div>
                <small>Single</small>
            </li>
        </div>
        <div class="seat-container">
            <div class="screen"></div>
            <div class="row">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row mt-4 justify-content-center align-items-center">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat twin"></div>
                <div class="seat twin mr-5"></div>
                <div class="seat twin"></div>
                <div class="seat twin mr-5"></div>
                <div class="seat twin"></div>
                <div class="seat twin mr-5"></div>
                <div class="seat twin"></div>
                <div class="seat twin mr-5"></div>
                <div class="seat twin"></div>
                <div class="seat twin"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div style="max-width: fit-content" class="seat-num font-white"></div>
                <div class="seat twin"></div>
                <div class="seat twin mr-5"></div>
                <div class="seat twin"></div>
                <div class="seat twin mr-5"></div>
                <div class="seat twin"></div>
                <div class="seat twin mr-5"></div>
                <div class="seat twin"></div>
                <div class="seat twin mr-5"></div>
                <div class="seat twin"></div>
                <div class="seat twin"></div>
                <div style="max-width: fit-content" class="seat-num font-white"></div>
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
    var i = 65;
    var j = 91;
    var n = 0;
    for (var k = i; k < ($('.seat-num').length) / 2; k++) {
        console.log(k);
        var str = String.fromCharCode(k);
        console.log(k);
        $('.seat-num')[n].innerHTML = str;
        n++;
    }
</script>
<script>
//    const container = document.querySelectorAll(".seat-container");
//    const seats = document.querySelectorAll(".row .seat:not(.occupied)");
//    const count = document.getElementById("count");
//    const total = document.getElementById("total");
//    const movieSelect = document.getElementById("movie");
//
//    let ticketPrice = +movieSelect.value;
//    console.log(ticketPrice)
//
////save Selected movie index and price
//    function SelectedMovieData(movieIndex, moviePrice) {
//        localStorage.setItem("selectedMovieIndex", movieIndex);
//        localStorage.setItem("selectedMoviePrice", moviePrice);
//    }
//
////function update total and count
//    function updateSelectedCount() {
//        const selectedSeats = document.querySelectorAll(".row .seat.selected");
//
//        const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));
//        localStorage.setItem("selectesSeats", JSON.stringify(seatsIndex));
//
//        const selectedSeatsCount = selectedSeats.length;
//        count.innerText = selectedSeatsCount;
//        total.innerText = selectedSeatsCount * ticketPrice;
//    }
//
////movie select event
//    movieSelect.addEventListener("change", (e) => {
//        ticketPrice = +e.target.value;
//        SelectedMovieData(e.target.selectedIndex, e.target.value);
//        updateSelectedCount();
//    });
//
//    container.addEventListener("click", function (e) {
//        if (
//                e.target.classList.contains("seat") &&
//                !e.target.classList.contains("occupied")
//                ) {
//            e.target.classList.toggle("selected");
//            updateSelectedCount();
//        }
//    });
</script>
@endpush
