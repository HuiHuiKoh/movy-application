@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">

        <h1 class="mt-4">Deleted Food or Beverages</h1>
        <hr>

        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Deleted
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
                            <th>Restore</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Description</th>                                       
                            <th>Restore</th>
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
                                 <a href="{{action('\App\Http\Controllers\FoodsController@restore',$food['id'])}}"
                                   class="btn btn-outline-warning" onclick="return confirm('Are you sure to restore?')">Restore</a>
                            </td>
                           
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.footer');
