@include('admin.header');

@include('admin.navbar');

<div id="layoutSidenav_content">

    <div class="container-fluid px-4">

        <h1 class="mt-4">Voucher List in MOVY</h1>
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
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.footer')
