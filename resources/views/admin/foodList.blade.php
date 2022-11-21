@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">

        <h1 class="mt-4">Foods And Beverages List in MOVY</h1>
        <hr>

<!--        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif-->

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Foods And Beverages
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>                                       
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>                                       
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($foods as $food)
                        <tr>
                            <td>{{$food['id']}}</td>
                            <td>{{$food['name']}}</td>
                            <td><img src="assets/img/{{$food['image']}}" width="100" height="130" alt="{{$food['image']}}"></td>
                            <td>RM {{$food['price']}}</td>
                            <td>{{$food['description']}}</td>
                            <td>
                                <a href="{{action('\App\Http\Controllers\FoodsController@edit',$food['id'])}}"
                                   class="btn btn-outline-primary">Edit</a>
                            <td>
                                <form method="POST" action="{{action('\App\Http\Controllers\FoodsController@destroy',$food['id'])}}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.footer');
