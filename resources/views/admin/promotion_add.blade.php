<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css') }}"></script>
<script src="{{ url('"https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@include('admin.header');

@include('admin.navbar');

<link rel="stylesheet" href="{{asset('assets\css\moviesUpdate.css')}}">

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Promotion</h1>
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

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif

    <div class="card-body">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <form method="POST" action="{{action('\App\Http\Controllers\MembershipController@storePromotion')}}" class="form-card" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Title<span class="text-danger"> *</span></label> 
                                    <input type="text" id="title" name="promotionTitle" placeholder=""> 
                                </div>
                            </div>                                                   
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Description<span class="text-danger"> *</span></label> 
                                    <textarea id="desc" name="promotionDescription" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <label class="form-control-label px-3">Image<span class="text-danger"> *</span></label> 
                            <input type="file" name="promotionImage" class="form-control" value="" accept="image/png, image/gif, image/jpeg , image/jpg">
                        </div>

                        <div class="card">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn-block btn-info btn-lg" style="background: #EFDDB8; border-color:#EFDDB8;">Create</button> 
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer');
