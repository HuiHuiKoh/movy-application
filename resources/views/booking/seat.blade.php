@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@section('content')
<section id="seats" class="align-items-center">
    <div class="text-center bg-black py-4 font-white">
        @foreach($movieSel as $movie)
        @foreach($cinemaSel as $cinema)
        @foreach($showtimes as $show)
        <p class="d-inline mr-3">{{$movie->name}}</p>
        <p class="d-inline mr-3">{{$movie->duration}}</p>
        <div class="movie-details text-uppercase mt-4 d-inline">
            <p class="d-inline mx-2 font-softOrange">{{$cinema->name}}</p>|
            <p class="d-inline mx-2 font-softOrange">Hall {{$show->hall}}</p>&nbsp;|
            <p class="d-inline mx-2 font-softOrange">{{$dateSel}}</p>&nbsp;|
            <p class="d-inline mx-2 font-softOrange">{{$timeSel}}</p>
        </div>
        @endforeach
        @endforeach
        @endforeach
    </div>

    <section class="selectseats p-5 mt-3">
        <h1 class="text-center">Seats</h1>
        <div class="row justify-content-center">
            <div class="col-auto font-white">
                <table class="table font-white mt-5">
                    @foreach($seatTypes as $seatType)
                    <tr>
                        <td><label class="quantity m-3 d-inline align-middle" for="qtyTwin">{{ $seatType->seat_type }}</label></td>
                        <td><p class="d-inline font-softOrange mb-0 mr-2 align-middle">RM {{ $seatType->price }}</p></td>
                        <td><input type="number" id="qty{{ $seatType->seat_type }}" name="qty{{ $seatType->seat_type }}" value="0" class="seats-num px-6 py-2" min="0" max="10" required></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col text-center">
            <button onclick="showSeats();" class="btn orange-btn mt-3 ml-0 confirm-btn">Confirm</button>
        </div>

        <div id="seatStructure" class="mt-5 d-none p-5">
            <div class="showcase">
                <li><div class="smallBox m-2" id="greenBox"></div><small>Selected</small></li>
                <li><div class="smallBox m-2" id="redBox"></div><small>Reserved</small></li>
                <li><div class="smallBox m-2" id="emptyBox"></div><small>Single</small></li>
                <li><div class="smallBox m-2" id="twinBox"></div><small>Twin</small></li>
                <li><div class="smallBox m-2" id="greyBox"></div><small>Unavailable</small></li>
            </div>

            <table id="seatsBlock" class="text-center">
                <tr><div class="screen"></div></tr>

                <!--Single seat-->
                @foreach (range('A', 'F') as $char)
                <tr>
                    <th class="pt-2">{{$char}}</th>
                    @for($i=0;$i<14;$i++)
                    <td><input type="checkbox" class="seats single" onclick="seatS()" value="{{$char}}{{$i+1}}"></td>
                    @endfor
                    <th class="pt-2">{{$char}}</th>
                </tr>
                @endforeach
            </table>

            @foreach (range('G', 'H') as $char)
            <ul class="text-center twin-seats font-white mt-4 pl-0">
                <li class="d-inline-block position-relative pt-2">{{$char}}</th>
                    @for($i=0;$i<5;$i++)
                <li class="d-inline-block position-relative mx-5"><input type="checkbox" class="seats twin" onclick="seatS()" value="{{$char}}{{$i+1}}"></td>
                    @endfor
                <li class="d-inline-block position-relative pt-2">{{$char}}</th>
            </ul>
            @endforeach


            <table class="Displaytable mt-5 text-center w-100 font-white">
                <tr><th>Seats</th></tr>
                <tr><td><textarea id="seatsDisplay" class="text-center"></textarea></td></tr>
            </table>

            <div class="col text-center mt-3">
                <button type="submit" class="continue-btn btn orange-btn mt-3 ml-0 float-end" onclick="checkError(48, 15)">Continue</button>
            </div>

            <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div id="errors"></div><button type="button" class="btn btn-secondary float-end" onclick="hideModal()">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-black" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" onclick="hideConfirmation()" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="confirm-value"></div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="hideConfirmation()">Cancel</button>
                            <button onclick="window.location.href ='{{asset('foods')}}'" type="submit" class="btn btn-primary">Continue</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
<script>
                                //Disable button when no value input
                                const formInputTwin = document.querySelector("#qtyTwin");
                                const formInputClassic = document.querySelector("#qtyClassic");
                                const formButton = $(".confirm-button");
                                formButton.disabled = true;
                                formInputTwin.addEventListener('change', (e) => {
                                    if (formInputTwin.value === "") {
                                        formButton.disabled = true;
                                    } else {
                                        formButton.disabled = false;
                                    }
                                });
                                formInputClassic.addEventListener('change', (e) => {
                                    if (formInputClassic.value === "") {
                                        formButton.disabled = true;
                                    } else {
                                        formButton.disabled = false;
                                    }
                                });
</script>
<script>
// Seats
    function showSeats() {
        if (!formButton.disabled) {
            $("#seatStructure").addClass("d-block");
            window.location.href = "#seatStructure";
        }
    }

    function seatS() {
        var checkboxes = document.getElementsByClassName('seats');
        var checkboxesChecked = [];
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkboxesChecked.push(checkboxes[i].value);
            }
        }
        document.getElementById("seatsDisplay").value = checkboxesChecked;
    }
</script>
<script>
// Model setting
    function showModal() {
        $('#myModal').modal('show');
    }
    function hideModal() {
        $('#myModal').modal('hide');
    }
    function showConfirmation() {
        $('#confirmation').modal('show');
    }
    function hideConfirmation() {
        $('#confirmation').modal('hide');
    }
</script>
<script>
// Validation
    function checkError(priceTwin, priceClassic) {
        var twinSeat = document.querySelector("#qtyTwin").value;
        var classicSeat = document.querySelector("#qtyClassic").value;
        var twinCount = 0;
        var classicCount = 0;
        twinSeat = parseInt(twinSeat);
        classicSeat = parseInt(classicSeat);
        if (twinSeat === 0 && classicSeat === 0) {
            showModal();
            document.getElementById("errors").innerHTML = "You must select at least 1 ticket";
        } else {
            var seats = document.getElementsByClassName('seats');
            var seatChecked = [];
            for (var i = 0; i < seats.length; i++) {
                if (seats[i].checked) {
                    seatChecked.push(seats[i].value);
                }
            }
            for (var i = 0; i < seatChecked.length; i++) {
                seatChecked[i] = seatChecked[i].toString();
                if (seatChecked[i].charAt(0) === 'G' || seatChecked[i].charAt(0) === 'H') {
                    twinCount++;
                } else {
                    classicCount++;
                }
            }
            if (twinCount === 0 && classicCount === 0) {
                showModal();
                document.getElementById("errors").innerHTML = "Please select your seats";
            } else if (twinCount !== 0 && twinSeat !== twinCount) {
                showModal();
                document.getElementById("errors").innerHTML = "You cannot select more than " + twinSeat + " Twin ticket(s)";
            } else if (classicCount !== 0 && classicSeat !== classicCount) {
                showModal();
                document.getElementById("errors").innerHTML = "You cannot select more than " + classicSeat + " Classic ticket(s)";
            } else {
                hideModal();
                showConfirmation();
                if (classicSeat === 0) {
                    var total = twinSeat * priceTwin;
                    var totalPrice = "RM" + total;
                    document.getElementById("confirm-value").innerHTML = "<p class='text-center'>You have selected " + twinSeat + " Twin ticket(s)</p>" + "\n\n"
                            + "<p class='text-center font-weight-bold'>TOTAL: " + totalPrice + "</p>";
                } else if (twinSeat === 0) {
                    var total = classicSeat * priceClassic;
                    var totalPrice = "RM" + total;
                    document.getElementById("confirm-value").innerHTML = "<p class='text-center'>You have selected " + classicSeat + " Classic ticket(s)</p>" + "\n\n"
                            + "<p class='text-center font-weight-bold'>TOTAL: " + totalPrice + "</p>";
                } else {
                    var totalTwin = twinSeat * priceTwin;
                    var totalClassic = classicSeat * priceClassic;
                    var totalPrice = "RM" + (totalTwin + totalClassic);
                    document.getElementById("confirm-value").innerHTML = "<p class='text-center'>You have selected " + classicSeat + " Classic ticket(s) and " + twinSeat + " Twin ticket(s)</p>" + "\n\n"
                            + "<p class='text-center font-weight-bold'>TOTAL: " + totalPrice + "</p>";
                }
            }
        }
    }

</script>
<script>
// Set cookie
    function createCookie(name, value, days) {
        var expires;

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        } else {
            expires = "";
        }

        document.cookie = escape(name) + "=" +
                escape(value) + expires + "; path=/";
    }

    function store() {
        var twinSeat = document.querySelector("#qtyTwin").value;
        var classicSeat = document.querySelector("#qtyClassic").value;

        if (classicSeat === 0) {
            var totalPrice = twinSeat * priceTwin;
            $(document).ready(function () {
                createCookie("totalAmt", totalPrice);
                createCookie("twinCount", twinSeat);
                createCookie("classicCount", classicSeat);
            });
        } else if (twinSeat === 0) {
            var totalPrice = classicSeat * priceClassic;
            $(document).ready(function () {
                createCookie("totalAmt", totalPrice);
                createCookie("twinCount", twinSeat);
                createCookie("classicCount", classicSeat);
            });
        } else {
            var totalTwin = twinSeat * priceTwin;
            var totalClassic = classicSeat * priceClassic;
            var totalPrice = totalTwin + totalClassic;
            $(document).ready(function () {
                createCookie("totalAmt", totalPrice);
                createCookie("twinCount", twinSeat);
                createCookie("classicCount", classicSeat);
            });
        }

        var checkboxes = document.getElementsByClassName('seats');
        var checkboxesChecked = [];
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                checkboxesChecked.push(checkboxes[i].value);
            }
        }
        $(document).ready(function () {
            createCookie("seatOrder", checkboxesChecked);
        });

        window.location.href = '<?php action("\App\Http\Controllers\PaymentController@form") ?>';
    }
</script>
@endpush
