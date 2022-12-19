@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">

        <h1 class="mt-4">Movies List in MOVY</h1>
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
                Movies
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Language</th>
                            <th>Type</th>
                            <th>Casts</th>
                            <th>Director</th>
                            <th>Duration</th>
                            <th>Released Date</th>            
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Language</th>
                            <th>Type</th>
                            <th>Casts</th>
                            <th>Director</th>
                            <th>Duration</th>
                            <th>Released Date</th>            
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($movies as $shows)
                        <tr>
                            <td>{{$shows['id']}}</td>
                            <td>{{$shows['name']}}</td>
                            <td><img src="assets/img/{{$shows['image']}}" width="100" height="130" alt="{{$shows['image']}}"></td>
                            <td>{{$shows['language']}}</td>
                            <td>{{$shows['type']}}</td>
                            <td>{{$shows['casts']}}</td>
                            <td>{{$shows['director']}}</td>
                            <td>{{$shows['duration']}}</td>
                            <td>{{$shows['releasedDate']}}</td>
                            <td>
                                <a href="{{action('\App\Http\Controllers\MoviesController@edit',$shows['id'])}}"
                                   class="btn btn-outline-primary">Edit</a>
                            <td>
                                <form method="POST" action="{{action('\App\Http\Controllers\MoviesController@destroy',$shows['id'])}}">
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
