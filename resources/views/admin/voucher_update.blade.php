<link href="{{ asset('assets/css/styles.css') }}" rel='stylesheet' type='text/css' />
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css') }}"></script>
<script src="{{ url('"https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>

<link rel="stylesheet" href="{{asset('assets\css\moviesUpdate.css')}}">

@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Voucher</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('voucher/list') }}">Foods List</a></li>
            <li class="breadcrumb-item">Edit Voucher</li>
        </ol>

    </div>

    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card-body">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <form method="POST" action="{{action('\App\Http\Controllers\MembershipController@updateVoucher',$id)}}" class="form-card" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="row justify-content-between text-left">
                                <label class="form-control-label px-3">Title<span class="text-danger"> *</span></label> 
                                <input type="text" id="vcTitle" name="voucherTitle" placeholder="" value="{{$vc->title}}"> 
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Voucher Code<span class="text-danger"> *</span></label> 
                                    <input type="text" id="vcCode" name="voucherCode" placeholder="" value="{{$vc->code}}"> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Discount Amount<span class="text-danger"> *</span></label> 
                                    <input type="text" id="dcAmt" name="discountAmount" placeholder="" value="{{$vc->discount_amount}}"> 
                                </div>
                            </div>                                                       
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Expiration Date<span class="text-danger"> *</span></label> 
                                    <input type="date" id="expDate" name="expirationDate" value="{{$vc->exp_date}}"> 
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn-block btn-info btn-lg" style="background: #EFDDB8; border-color:#EFDDB8;">Update</button> 
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer');
