@extends('layouts.app', ['pageTitle'=>'Movy Forum'], ['title'=>'Forum'])

@section('content')
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black mx-0">
        <a class="navbar-brand" href=""><img width="40px" src="{{asset ('import/assets/img/movy-forum-logo.png') }}" alt="Movy Forum"></a>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('forum')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('forum/forum')}}">Forum</a>
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

            <form class="form-inline my-2 ">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn my-2 my-sm-0 font-white p-0" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Profile <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right bg-black" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <div class="mx-5">
                <a href="{{asset('forum/login')}}" class="d-inline p-2 mx-1">
                    <i class="bi bi-person-circle"></i>&nbsp;
                    Login
                </a>
            </div>




        </div>
    </nav>
    <div class="mb-3 p-5">
        @yield('forum')
    </div>
</div>
@endsection

