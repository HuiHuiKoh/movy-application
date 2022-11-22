@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@push('css')
<style>
    #seating-plan {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .seats-num{
        border-radius:8px;
        background: none;
        border: 2px solid var(--white);
        color: var(--white);
        font-size: medium;
        width: 80px;
    }
    .showcase {
        background-color: rgba(0, 0, 0, 0.15);
        padding: 5px 10px;
        border-radius: 6px;
        list-style-type: none;
        display: flex;
        justify-content: space-between;
        color: var(--white);
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
        background-color: var(--white);
        height: 70px;
        width: 100%;
        margin: 15px 0;
        transform: rotateX(-45deg);
        box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
    }
    #seatsBlock{
        width: 100%;
        margin: auto;
    }
    #seatsBlock th{
        color: var(--white);
    }
    #greenBox::before, #redBox::before, #emptyBox::before, #greyBox::before{
        content:'';
        width:20px;
        height:20px;
        float:left;
        margin-left: 15%;
        margin-right: 5%;
    }
    #twinBox::before{
        content:'';
        width:40px;
        height:20px;
        float:left;
        margin-left: 15%;
        margin-right: 5%;
    }
    .smallBox{
        text-align: left;
    }
    #emptyBox::before{
        box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:var(--lightBlue);
    }
    #twinBox::before{
        box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:var(--purple);
    }
    #greyBox::before{
        background-color: var(--lightGrey);
    }
    #greenBox::before{
        background-color:var(--strongLimeGreen);
    }
    #redBox::before{
        background-color:var(--red);
    }
    .seatGap{
        width:5%;
    }
    .seatVGap{
        height:30px;
    }
    .Displaytable td, .Displaytable th {
        border: 1px solid #ffffff;
        text-align: center;
    }
    .Displaytable textarea{
        border:none;
        background:transparent;
        color: var(--white);
        width: 100%;
    }
    #seatsBlock input[type=checkbox]{
        width:0px;
        margin-right:18px;
    }

    #seatsBlock .single:before {
        content: "";
        width: 20px;
        height: 20px;
        display: inline-block;
        text-align: center;
        box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:var(--lightBlue);
    }
    #seatsBlock .single:checked:before{
        background-color:var(--strongLimeGreen);
        font-size: 20px;
    }
    #seatsBlock .reserved:before{
        background-color:var(--red);
    }
    .twin-seats{
        list-style: none;
    }
    .twin-seats .twin:before {
        content: "";
        width: 40px;
        height: 20px;
        display: inline-block;
        text-align: center;
        box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
        background-color:var(--purple);
    }
    .twin-seats .twin:checked:before{
        background-color:var(--strongLimeGreen);
        font-size: 20px;
    }
    .twin-seats .reserved:before{
        background-color:var(--red);
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

    <section class="selectseats p-5 mt-3">
        <h1 class="text-center">Number of Seats</h1>
        <div class="row justify-content-center">
            <div class="col-auto font-white">
                <table class="table font-white mt-5">
                    <tr>
                        <td><label class="quantity m-3 d-inline" for="qtyTwin">Twin</label></td>
                        <td><p class="d-inline font-softOrange mb-0 mr-2">RM 20.00</p></td>
                        <td><input type="number" id="qtyTwin" name="qtyTwin" value="0" class="seats-num px-6 py-2" min="0" max="10" required></td>
                    </tr>
                    <tr>
                        <td><label class="quantity m-3 d-inline" for="qtyClassic">Classic</label></td>
                        <td><p class="d-inline font-softOrange mb-0 mr-2">RM 10.00</p></td>
                        <td><input type="number" id="qtyClassic" name="qtyClassic" value="0" class="seats-num px-6 py-2" min="0" max="10" required></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col text-center">
            <button onclick="showSeats();" class="btn orange-btn mt-3 ml-0 confirm-btn">Confirm</button>
        </div>

        <div id="seatStructure" class="mt-5 d-block p-5">
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
                <button type="submit" class="btn orange-btn mt-3 ml-0 float-end">Continue</button>
            </div>

            <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Warning</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p id="modal-inner-content"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

                    function showSeats() {
                        if (!formButton.disabled) {
                            $("#seatStructure").addClass("d-block");
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
@endpush
