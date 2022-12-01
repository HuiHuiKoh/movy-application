@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">

        <h1 class="mt-4">Showtimes List in MOVY</h1>
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
                Showtimes
            </div>

            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Cinema</th>
                            <th>Date and Time</th>
                            <th>Hall</th>          
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Showtimes</th>
                            <th>Cinema</th>
                            <th>Hall</th>          
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($movies as $movie)
                        <tr>
                            <td>{{$movie->id}}</td>
                            <td>{{$movie->movies_name}}</td>
                            <td><img src="assets/img/{{$movie->movies_image}}" width="100" height="130" alt="{{$movie->movies_image}}"></td>
                            <td>{{$movie->cinemas_name}}</td>
                            <td>{{$movie->dateTime}}</td>                           
                            <td>{{$movie->hall}}</td>

                            <td>
                                <form method="POST" action="{{action('\App\Http\Controllers\ShowtimesController@destroy',$movie->id)}}">
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
