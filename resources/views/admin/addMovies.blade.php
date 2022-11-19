@include('stock_management.navbar');

<link rel="stylesheet" href="{{asset('assets\css\bookUpdate.css')}}">

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">
        <h1 class="mt-4">Add a New Book into the Shelf</h1>
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
                    <form method="POST" action="{{action('\App\Http\Controllers\ProductController@store')}}" class="form-card" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Title<span class="text-danger"> *</span></label> 
                                    <input type="text" id="name" name="name" placeholder=""> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Language<span class="text-danger"> *</span></label> 
                                    <input type="text" id="language" name="language" placeholder="English | Malay | Chinese | Other ..." > 
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Author<span class="text-danger"> *</span></label> 
                                    <input type="text" id="author" name="author" placeholder=""> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Publisher<span class="text-danger"> *</span></label> 
                                    <input type="text" id="publisher" name="publisher" placeholder=""> 
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Price<span class="text-danger"> *</span></label> 
                                    <input type="text" id="price" name="price" placeholder=""> 
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Stock<span class="text-danger"> *</span></label> 
                                    <input type="number" id="stock" name="stock" min="0" max="9999">
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> 
                                    <label class="form-control-label px-3">Description</label> 
                                    <textarea id="description" name="description" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <label class="form-control-label px-3">Image<span class="text-danger"> *</span></label> 
                            <input type="file" name="image" class="form-control" value="" accept="image/png, image/gif, image/jpeg , image/jpg">
                        </div>

                        <div class="card">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn-block btn-info btn-lg">Create</button> 
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
