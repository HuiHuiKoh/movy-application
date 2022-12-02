<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success bg-opacity-100">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('dashboard') }}">MOVY Management</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!--        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                                </div>
                </form>-->
        <!--        <div><a href="{{ url('restapi')}}"><button type="button" class="btn btn-secondary btn-sm">Exchange Rate API</button></a></div>
        -->
        <!--Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <!--                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                                        <li><hr class="dropdown-divider" /></li>
                                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                                    </ul>
                                </li>-->
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ url('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Management</div>
                        <?php $collapse = 0; ?>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts<?php echo $collapse ?>" aria-expanded="false" aria-controls="collapseLayouts<?php echo $collapse ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-reorder"></i></div>
                            Movies
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts<?php echo $collapse ?>" aria-labelledby="heading<?php echo $collapse ?>" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ asset('moviesList') }}"><div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>Movies List</a>
                                <a class="nav-link" href="{{ asset('addMovies') }}"><div class="sb-nav-link-icon"><i class="fa fa-folder"></i></div>Add new Movies</a>
                                <a class="nav-link" href="{{ asset('restoreMovies')}}"><div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>Restore Movies</a>
                            </nav>
                        </div>
                        <?php $collapse++ ?>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts<?php echo $collapse ?>" aria-expanded="false" aria-controls="collapseLayouts<?php echo $collapse ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-reorder"></i></div>
                            Showtimes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts<?php echo $collapse ?>" aria-labelledby="heading<?php echo $collapse ?>" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ asset('showtimesList') }}"><div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>Showtimes List</a>
                                <a class="nav-link" href="{{ asset('addShowtimes') }}"><div class="sb-nav-link-icon"><i class="fa fa-folder"></i></div>Add new Showtimes</a>
                                <a class="nav-link" href="{{ asset('restoreShowtimes')}}"><div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>Restore Showtimes</a>
                            </nav>
                        </div>
                        <?php $collapse++ ?>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts<?php echo $collapse ?>" aria-expanded="false" aria-controls="collapseLayouts<?php echo $collapse ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-reorder"></i></div>
                            Foods
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts<?php echo $collapse ?>" aria-labelledby="heading<?php echo $collapse ?>" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ asset('foodList') }}"><div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>Food List</a>
                                <a class="nav-link" href="{{ asset('addFoods') }}"><div class="sb-nav-link-icon"><i class="fa fa-folder"></i></div>Add new Foods</a>
                                <a class="nav-link" href="{{ asset('restoreFoods')}}"><div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>Restore Foods</a>
                            </nav>
                        </div>
                        <?php $collapse++ ?>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts<?php echo $collapse ?>" aria-expanded="false" aria-controls="collapseLayouts<?php echo $collapse ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-reorder"></i></div>
                            Promotions
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts<?php echo $collapse ?>" aria-labelledby="heading<?php echo $collapse ?>" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ asset('promotion/list') }}"><div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>Promotion List</a>
                                <a class="nav-link" href="{{ asset('promotion/add') }}"><div class="sb-nav-link-icon"><i class="fa fa-folder"></i></div>Add new Promotion</a>
                                <a class="nav-link" href="{{ url('book_restore')}}"><div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>Restore Promotion</a>
                            </nav>
                        </div>
                        <?php $collapse++ ?>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts<?php echo $collapse ?>" aria-expanded="false" aria-controls="collapseLayouts<?php echo $collapse ?>">
                            <div class="sb-nav-link-icon"><i class="fa fa-reorder"></i></div>
                            Vouchers
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts<?php echo $collapse ?>" aria-labelledby="heading<?php echo $collapse ?>" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ asset('voucher/list') }}"><div class="sb-nav-link-icon"><i class="fa fa-list-alt"></i></div>Voucher List</a>
                                <a class="nav-link" href="{{ asset('voucher/add') }}"><div class="sb-nav-link-icon"><i class="fa fa-folder"></i></div>Add new Voucher</a>
                                <a class="nav-link" href="{{ url('book_restore')}}"><div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>Restore Voucher</a>
                            </nav>
                        </div>

                        

                        <!--                        Generate Report-->
                        <div class="sb-sidenav-menu-heading">Report</div>
                        <a class="nav-link" href="{{  asset('salesReport')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-area-chart"></i></div>
                            Sales Chart
                        </a>

                        <a class="nav-link" href="{{ asset('userReport')}} ">
                            <div class="sb-nav-link-icon"><i class="fa fa-area-chart"></i></div>
                            User Chart
                        </a>
                    </div>

            </nav>
        </div>