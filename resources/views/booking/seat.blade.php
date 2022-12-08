@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
        <form action="{{ asset('/foods') }}" method="post">
            @csrf
            <h1 class="text-center">Seats</h1>
            <div class="row justify-content-center">
                <div class="col-auto font-white">
                    <table class="table font-white">
                        <div id="qty-required" class="font-red text-center my-2"></div>
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
                        <td><input type="checkbox" name="classicSeat[]" class="seats single" onclick="seatS()" value="{{$char}}{{$i+1}}"></td>
                        @endfor
                        <th class="pt-2">{{$char}}</th>
                    </tr>
                    @endforeach
                </table>

                <?php
                $seatReserved = array();
                foreach ($seats as $seat) {
                    array_push($seatReserved, $seat->row . $seat->number);
                } var_dump($seatReserved);
                ?>

                @foreach (range('G', 'H') as $char)
                <ul class="text-center twin-seats font-white mt-4 pl-0">
                    <li class="d-inline-block position-relative pt-2">{{$char}}</li>
                    @for($i=0;$i<5;$i++)
                    <li class="d-inline-block position-relative mx-5">
                        <input type="checkbox" class="seats twin" name="twinSeat[]" onclick="seatS()" value="{{$char}}{{$i+1}}">
                    </li>
                    @endfor
                    <li class="d-inline-block position-relative pt-2">{{$char}}</li>
                </ul>
                @endforeach


                <table class="Displaytable mt-5 text-center w-100 font-white">
                    <tr><th>Seats</th></tr>
                    <tr><td><textarea id="seatsDisplay" class="text-center"></textarea></td></tr>
                </table>

                <div class="col text-center mt-3">
                    <div class="continue-btn btn orange-btn mt-3 ml-0 float-end" onclick="checkError(48, 15)">Continue</div>
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
                                <div id="confirm-price"></div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" onclick="hideConfirmation()">Cancel</button>
                                <button type="submit" name="continue-food" class="btn btn-primary btn-proceed">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                                    const inputTwin = $("#qtyTwin");
                                    const inputClassic = $("#qtyClassic");
                                    document.getElementById("qty-required").innerHTML =
                                            "Please insert ticket quantity";
                                    inputTwin.on('change', function () {
                                        if (inputTwin.value === 0) {
                                            document.getElementById("qty-required").innerHTML =
                                                    "Please insert ticket quantity";
                                        } else if (inputTwin.value !== 0) {
                                            document.getElementById("qty-required").innerHTML = "";
                                            showSeats();
                                        }
                                    });
                                    inputClassic.on('change', function () {
                                        if (inputClassic.value === 0) {
                                            document.getElementById("qty-required").innerHTML =
                                                    "Please insert ticket quantity";
                                        } else if (inputClassic.value !== 0) {
                                            document.getElementById("qty-required").innerHTML = "";
                                            showSeats();
                                        }
                                    });
</script>
<script>
// Seats
    function showSeats() {
        $("#seatStructure").addClass("d-block");
    }

    var checkboxes = $('.seats');
    var passedSeat =<?php echo json_encode($seatReserved); ?>;

//Set reserved seat
    for (var k = 0; k < checkboxes.length; k++) {
        for (var i = 0; i < passedSeat.length; i++) {
            if (checkboxes[k].value === passedSeat[i]) {
                checkboxes[k].classList.add('reserved');
                checkboxes[k].disabled = true;
            }
        }
    }

//Display seat order
    function seatS() {
        var exist = false;
        var checkboxesChecked = [];

        for (var k = 0; k < checkboxes.length; k++) {
            if (checkboxes[k].checked) {
                if (passedSeat.length > 0) {
                    for (var i = 0; i < passedSeat.length; i++) {
                        if (passedSeat.includes(checkboxes[k].value)) {
                            exist = true;
                        }
                    }
                    if (!exist) {
                        checkboxesChecked.push(checkboxes[k].value);
                    }
                } else if (passedSeat.length === 0) {
                    checkboxesChecked.push(checkboxes[k].value);
                }
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
                    document.getElementById("confirm-value").innerHTML = "<p class='text-center'>You have selected " + twinSeat + " Twin ticket(s)</p>";
                    document.getElementById("confirm-price").innerHTML = "<p class='text-center font-weight-bold'>TOTAL: " + totalPrice + "</p>";
                } else if (twinSeat === 0) {
                    var total = classicSeat * priceClassic;
                    var totalPrice = "RM" + total;
                    document.getElementById("confirm-value").innerHTML = "<p class='text-center'>You have selected " + classicSeat + " Classic ticket(s)</p>";
                    document.getElementById("confirm-price").innerHTML = "<p class='text-center font-weight-bold'>TOTAL: " + totalPrice + "</p>";
                } else {
                    var totalTwin = twinSeat * priceTwin;
                    var totalClassic = classicSeat * priceClassic;
                    var totalPrice = "RM" + (totalTwin + totalClassic);
                    document.getElementById("confirm-value").innerHTML = "<p class='text-center'>You have selected " + classicSeat + " Classic ticket(s) and " + twinSeat + " Twin ticket(s)</p>";
                    document.getElementById("confirm-price").innerHTML = "<p class='text-center font-weight-bold'>TOTAL: " + totalPrice + "</p>";
                }
            }
        }
    }

</script>
@endpush
