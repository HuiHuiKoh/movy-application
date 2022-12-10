@extends('layouts.app', ['pageTitle'=>'Movy Forum'], ['title'=>'Forum'])

use Illuminate\Support\Facades\Auth;
@section('content')
<div class="container mt-5" style="background-image: url('https://cdn.wallpapersafari.com/30/74/FAxu7K.png')">
    <nav class="navbar navbar-expand-lg mx-0">
        <a class="navbar-brand mr-5" style="font-size: 20px" href="{{asset('forum')}}">MOVY FORUM</a>

        <div class="collapse navbar-collapse" id="navbarText" style="height: 140px">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{asset('forum')}}">Forum</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="<?php echo asset('forum/post/' . Auth::user()->id) ?>">My Posts</a>
                </li>
            </ul>
            <a href="{{asset('forum/create')}}"><button class="btn square-btn orange-outline-btn mx-5">Create New Post</button></a>

            <!--            <form class="form-inline my-2 mx-5">
                            <input class="form-control" type="search" placeholder="Search Forum" aria-label="Search">
                            <button class="btn my-2 my-sm-0 font-white p-0" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>-->
        </div>
    </nav>
    <div class="mb-3 p-5">
        @yield('forum')
    </div>
</div>
@endsection

