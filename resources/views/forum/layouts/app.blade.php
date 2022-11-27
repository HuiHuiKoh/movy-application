@extends('layouts.app', ['pageTitle'=>'Movy Forum'], ['title'=>'Forum'])

@section('content')
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-transparent py-4 border-bottom">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse py-0" id="navbarSupportedContent">
                <a class="logo me-auto" href=""><img width="150px" src="{{asset ('import/assets/img/movy-forum-logo.png') }}" alt="Movy Forum" class="img-fluid"></a>
                <ul class="navbar-nav mr-auto">
                    <li class="dropdown"><a href="#"><span>Movies</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{asset ('showtimes') }}">Showtimes</a></li>
                                <li><a href="{{asset ('f&b') }}">F & B</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"><span>Membership</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{asset ('membership/1/check') }}">Check member points</a></li>
                                <li><a href="{{asset ('membership') }}">Promotions</a></li>
                                <li><a href="{{asset ('membership/voucher') }}">Vouchers</a></li>
                            </ul>
                        </li>
                        <li><a href="{{asset ('forum') }}">Forum</a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0 mx-5">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0 font-white p-0" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <div>
                    <a href="{{asset('forum/register')}}" class="d-inline bg-transparent border-0 btn square-btn btn-secondary p-2 mx-1">
                        Register
                    </a>
                    <a href="{{asset('forum/login')}}" class="d-inline btn square-btn btn-secondary p-2 mx-1">
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
</div>
@endsection

