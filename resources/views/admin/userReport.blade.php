@include('admin.header');

@include('admin.navbar');

<link rel="stylesheet" href="{{asset('assets\css\moviesUpdate.css')}}">

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">
        <h1 class="mt-4">Generate User Report</h1>
    </div>
    <hr>

<!--    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif-->

<!--    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif-->

    <div class="card-body">
        <div class="container-fluid px-1 py-5 mx-auto">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <form method="POST" action="{{action('\App\Http\Controllers\ChartController@getNewUser')}}" class="form-card" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                                                                           
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Year<span class="text-danger"> *</span></label> 
                                    <input type="text" id="year" name="year" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn-block btn-info btn-lg" style="background: #EFDDB8; border-color:#EFDDB8;">Generate</button> 
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer');
