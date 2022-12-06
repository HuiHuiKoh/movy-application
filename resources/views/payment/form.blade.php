@extends('layouts.app', ['pageTitle'=>'Payment'], ['title'=>'Payment'])

@push('css')
<style>
    .payment-modal .close{
        font-size: 21px;
        cursor: pointer
    }
    .payment-modal .modal-body{
        height: fit-content;
    }
    .payment-modal .nav-tabs{
        border:none !important
    }
    .payment-modal .nav-tabs .nav-link.active{
        color: #495057;
        background-color: var(--white);
        border-top: 3px solid blue !important
    }
    .payment-modal .nav-tabs .nav-link{
        margin-bottom: -1px;
        border: 1px solid transparent;
        border-top-left-radius: 0rem;
        border-top-right-radius: 0rem;
        border-top: 3px solid #eee;
        font-size: 20px
    }
    .payment-modal .nav-tabs .nav-link:hover{
        border-color: #e9ecef #ffffff #ffffff
    }
    .payment-modal .nav-tabs{
        display: table !important;
        width: 100%
    }
    .payment-modal .nav-item{
        display: table-cell
    }
    .payment-modal .form-control{
        border-bottom: 1px solid #eee !important;
        border:none;
        font-weight: 600
    }
    .payment-modal .form-control:focus{
        color: #495057;
        background-color: #fff;
        border-color: #8bbafe;
        outline: 0;
        box-shadow: none
    }
    .payment-modal .inputbox{
        position: relative;
        margin-bottom: 20px;
        width: 100%
    }
    .payment-modal .inputbox span{
        position: absolute;
        top:7px;
        left: 11px;
        transition: 0.5s
    }
    .payment-modal .pay button{
        height: 47px;
        border-radius: 37px
    }
</style>
@endpush

@section('content')
<section id="payment">
    <div class="container px-5 mt-5 mb-3 w-75 bg-black text-left">
        <div class="row">
            <div class="card border-0 rounded-0 bg-black">
                <div class="card-body p-4 font-white">
                    <div>
                        <h1>Purchase Details</h1>
                    </div>
                    <div class="my-5">
                        <div class="float-end">
                            <p>RM 20.00</p>
                        </div>
                        <div>
                            <p>Tickets - Twin</p>
                        </div>
                        <hr>
                        <div class="float-end">
                            <p>RM 0.00</p>
                        </div>
                        <div>
                            <p>Food & Beverages</p>
                        </div>
                        <hr>
                        <div>
                            <button class="btn orange-outline-btn square-btn font-weight-normal float-end">ADD</button>
                        </div>
                        <div>
                            <button class="btn orange-outline-btn square-btn disabled font-weight-normal">Voucher Code</button>
                        </div>
                    </div>
                    <div class="float-end">
                        <p>RM 20.00</p>
                    </div>
                    <div>
                        TOTAL
                    </div>              
                </div>
            </div>
        </div>
    </div>
    <div class="col text-center">
        <button type="button" onclick="showCancel()" class="btn orange-btn mb-5">Cancel</button>
        <button type="button" class="btn orange-btn mb-5" data-toggle="modal" data-target="#staticBackdrop">Pay Now</button>
    </div>  

    <!--Cancel Modal-->
    <div class="modal" id="cancel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancel</h5>
                    <button type="button" class="close" onclick="hideCancel()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel your payment?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="hideCancel()">Close</button>
                    <button onclick="backToHome()" type="button" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Option Modal -->
    <div class="modal fade payment-modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> 
        <div class="modal-dialog"> 
            <div class="modal-content">
                <div class="modal-body"> 
                    <div class="text-right"> 
                        <i class="fa fa-close close" data-dismiss="modal"></i> 
                    </div> 
                    <div class="tabs mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist"> 
                            <li class="nav-item" role="presentation"> 
                                <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true"> 
                                    <img src="https://d3.harvard.edu/platform-digit/wp-content/uploads/sites/2/2020/02/visa-logo-png-2026-1.png" width="80"> 
                                </a>
                            </li> 
                            <li class="nav-item" role="presentation"> 
                                <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false"> 
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/1200px-PayPal.svg.png" width="80"> 
                                </a> 
                            </li> 
                        </ul> 
                        <div class="tab-content" id="myTabContent"> 
                            <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab"> 
                                <div class="mt-4 mx-4"> 
                                    <div class="text-center"> 
                                        <div class="h5">Credit card / Debit Card</div> 
                                    </div>
                                    <form action="" method="post">
                                        <div class="form mt-3"> 
                                            <div class="inputbox">
                                                <label for="cName">Cardholder Name</label>
                                                <input type="text" name="cName" class="form-control" required="required"> 

                                            </div> 
                                            <div class="inputbox"> 
                                                <label for="cNum">Card Number</label>
                                                <input type="text" name="cNum" class="form-control" required="required"> 
                                            </div> 
                                            <div class="d-flex flex-row"> 
                                                <div class="inputbox mx-1">
                                                    <label for="expDate">Expiration Date</label>
                                                    <input type="month" name="expDate" class="form-control" min="2022-11" max="2028-12" required="required"> 
                                                </div>
                                                <div class="inputbox mx-1">
                                                    <label for="cvv">CVV</label>
                                                    <input type="password" name="cvv" min="1" max="999" class="form-control" required="required"> 
                                                </div> 
                                            </div> 
                                            <div class="px-5 pay">
                                                <button type="submit" class="btn btn-success btn-block">Pay with Card</button>
                                                <button class="btn btn-secondary btn-block" data-dismiss='modal'>Cancel</button>
                                            </div>
                                        </div> 
                                    </form>
                                </div> 
                            </div> 
                            <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab"> 
                                <div class="px-5 mt-5"> 
                                    <div class="inputbox"> 
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" class="form-control" required="required"> 
                                    </div>
                                    <div class="inputbox">
                                        <label for="pw">Password</label>
                                        <input type="password" name="pw" class="form-control" required="required"> 
                                    </div>
                                    <div class="pay px-5">
                                        <button class="btn btn-primary btn-block">Pay with Paypal</button>
                                        <button class="btn btn-secondary btn-block" data-dismiss='modal'>Cancel</button>
                                    </div> 
                                </div> 
                            </div> 
                        </div>
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
<script>
                        function showCancel() {
                            $("#cancel").modal('show');
                        }
                        function hideCancel() {
                            $("#cancel").modal('hide');
                        }
                        function backToHome() {
                            window.location.href = "<?php echo asset("home") ?>";
//                            destroy session
                        }
</script>
@endpush

