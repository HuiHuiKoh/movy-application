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
        <h1 class="mt-4">Edit Movies</h1>
        <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('moviesList') }}">Movies List</a></li>
        <li class="breadcrumb-item">Edit Movies</li>
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
                    <form method="POST" action="{{action('\App\Http\Controllers\MoviesController@update',$id)}}" class="form-card" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Name<span class="text-danger"> *</span></label> 
                                    <input type="text" id="name" name="name" placeholder="" value="{{$movies->name}}"> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Language<span class="text-danger"> *</span></label> 
                                    <input type="text" id="language" name="language" placeholder="English / Malay / Chinese / Other ..." value="{{$movies->language}}"> 
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Type<span class="text-danger"> *</span></label> 
                                    <input type="text" id="type" name="type" placeholder="" value="{{$movies->type}}"> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Duration<span class="text-danger"> *</span></label> 
                                    <input type="text" id="duration" name="duration" placeholder="" value="{{$movies->duration}}"> 
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Release Date<span class="text-danger"> *</span></label> 
                                    <input type="date" id="releasedDate" name="releasedDate" placeholder="" value="{{$movies->releasedDate}}"> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Category<span class="text-danger"> *</span></label> 
                                    <select name="category" id="category">
                                        
<!--                                        <option value="{{$movies->categoryID}}">{{$movies->categoriesName}}</option>     -->
                                        <option value="2">Coming Soon</option>  
                                        <option value="1">Now Showing</option> 
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Casts <span class="text-danger"> *</span></label> 
                                    <input type="text" id="casts" name="casts" placeholder="" value="{{$movies->casts}}"> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Director<span class="text-danger"> *</span></label> 
                                    <input type="text" id="director" name="director" placeholder="" value="{{$movies->director}}">
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Trailer Link</label> 
                                    <textarea id="trailer" name="trailer" placeholder="">{{$movies->trailer}}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Synopsis</label> 
                                    <textarea id="synopsis" name="synopsis" placeholder="">{{$movies->synopsis}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <label class="form-control-label px-3">Image<span class="text-danger"> *</span></label> 
                            <div id="imageCenter">
                                <img src="/assets/img/{{$movies['image']}}" width="150px" height="200px" alt="{{$movies['image']}}">
                            </div>
                            <br>
                            <input type="file" name="image" value="/assets/img/{{$movies['image']}}" accept="image/png, image/gif, image/jpeg , image/jpg" />
                        </div>

                        <div class="card">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn-block btn-info btn-lg" style="background: #EFDDB8; border-color:#EFDDB8; ">Update</button> 
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer');
