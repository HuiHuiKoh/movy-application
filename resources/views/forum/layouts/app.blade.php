@extends('layouts.app', ['pageTitle'=>'Movy Forum'], ['title'=>'Forum'])

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black mx-0">
        <a class="navbar-brand" href=""><img width="40px" src="{{asset ('import/assets/img/movy-forum-logo.png') }}" alt="Movy Forum"></a>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">New Thread</a>
                </li>
                
            </ul>
            <!--If user is logged in-->
            <!--            <div class="dropdown mx-5">
                            <a href="#">
                                <i class="bi bi-person-circle mr-2" style="font-size: 1rem"></i>
                                <span>Username</span><i class="bi bi-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu-right">
                                <li><a href="" class="m-0">My Thread</a></li>
                                <li><a href="" class="m-0">Logout</a></li>
                            </ul>
                        </div>-->
            <!--If user is logged out-->
            <div class="mx-5">
                <a href="{{asset('forum/register')}}" class="d-inline p-2 mx-1">
                    Register
                </a>
                <a href="{{asset('forum/login')}}" class="d-inline p-2 mx-1">
                    <i class="bi bi-person-circle"></i>&nbsp;
                    Login
                </a>
            </div>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn my-2 my-sm-0 font-white p-0" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

        </div>
    </nav>
    <div class="mb-3 p-5">
        @yield('forum')
    </div>
</div>
@endsection

