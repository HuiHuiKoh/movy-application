@include('admin.header');
@include('admin.navbar');

<link rel="stylesheet" href="{{asset('assets\css\moviesUpdate.css')}}">

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">
        <h1 class="mt-4">Add a New Movies</h1>
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
                    <form method="POST" action="{{action('\App\Http\Controllers\MoviesController@store')}}" class="form-card" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Name<span class="text-danger"> *</span></label> 
                                    <input type="text" id="name" name="name" placeholder=""> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Language<span class="text-danger"> *</span></label> 
                                    <input type="text" id="language" name="language" placeholder="English / Malay / Chinese / Other ..." > 
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Type<span class="text-danger"> *</span></label> 
                                    <input type="text" id="type" name="type" placeholder=""> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Duration<span class="text-danger"> *</span></label> 
                                    <input type="text" id="duration" name="duration" placeholder="hrs and mins"> 
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Release Date <span class="text-danger"> *</span></label> 
                                    <input type="date" id="releasedDate" name="releasedDate" placeholder=""> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Category<span class="text-danger"> *</span></label> 
                                    <select name="category" id="category">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Casts <span class="text-danger"> *</span></label> 
                                    <input type="text" id="casts" name="casts" placeholder=""> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Director<span class="text-danger"> *</span></label> 
                                    <input type="text" id="director" name="director">
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Trailer Link<span class="text-danger"> *</span></label> 
                                    <textarea id="trailer" name="trailer" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Synopsis</label> 
                                    <textarea id="synopsis" name="synopsis" placeholder=""></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <label class="form-control-label px-3">Image<span class="text-danger"> *</span></label> 
                            <input type="file" name="image" class="form-control" value="" accept="image/png, image/gif, image/jpeg , image/jpg">
                        </div>

                        <div class="card">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn-block btn-info btn-lg" style="background: #EFDDB8; border-color:#EFDDB8; ">Create</button> 
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer');
