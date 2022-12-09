<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css') }}"></script>
<script src="{{ url('https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">

        <h1 class="mt-4">Deleted Promotions</h1>
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
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Restore</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Restore</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($promotions as $promo)
                        <tr>
                            <td>{{$promo->id}}</td>
                            <td>{{$promo->title}}</td>
                            <td>{{$promo->description}}</td>
                            <td><img src="assets/img/{{$promo['image']}}" width="100" height="130" alt="{{$promo['image']}}"></td>                            
                            <td>
                                <a href="{{action('\App\Http\Controllers\MembershipController@restorePromotion',$promo['id'])}}"
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
