<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success bg-opacity-100">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('dashboard') }}">MOVY Management</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!--            <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        </div>-->
        </form>
<!--        <div><a href="{{ url('restapi')}}"><button type="button" class="btn btn-secondary btn-sm">Exchange Rate API</button></a></div>-->
        <!-- Navbar-->
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
                        <div class="sb-sidenav-menu-heading">Movies</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-reorder"></i></div>
                            Books
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('booklist') }}">Movies List</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ url('book_new') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                            Add new Movies
                        </a>
                        <a class="nav-link" href="{{ url('book_restore')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-archive"></i></div>
                            Restore Movies
                        </a>
                        <div class="sb-sidenav-menu-heading">Control</div>
                        <a class="nav-link" href="{{ url('stock_in')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-sort-numeric-asc"></i></div>
                            Stock
                        </a>
                        
<!--                        Generate Report-->
                        <div class="sb-sidenav-menu-heading">Report</div>
                        <a class="nav-link" href="{{ url('chart/stock')}}">
                            <div class="sb-nav-link-icon"><i class="fa fa-area-chart"></i></div>
                            Stock Chart
                        </a>
                        
                        <a class="nav-link" href="{{ url('chart/user/date("Y")')}} ">
                            <div class="sb-nav-link-icon"><i class="fa fa-area-chart"></i></div>
                            User Chart
                        </a>
                    </div>
                    
            </nav>
        </div>