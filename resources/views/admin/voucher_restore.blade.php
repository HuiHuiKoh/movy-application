<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css') }}"></script>
<script src="{{ url('https://use.fontawesome.com/releases/v6.1.0/js/all.js') }}"></script>
<script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">

        <h1 class="mt-4">Deleted Vouchers</h1>
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
                            <th>Code</th>
                            <th>Discount Amount</th>
                            <th>Expiration Date</th>                                       
                            <th>Restore</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Discount Amount</th>
                            <th>Expiration Date</th>                                
                            <th>Restore</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($vouchers as $vc)
                        <tr>
                            <td>{{$vc->id}}</td>
                            <td>{{$vc->title}}</td>
                            <td>{{$vc->code}}</td> 
                            <td>{{$vc->discount_amount}}</td>
                            <td>{{$vc->exp_date}}</td>
                            <td>
                                <a href="{{action('\App\Http\Controllers\MembershipController@restoreVoucher',$vc['id'])}}"
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
