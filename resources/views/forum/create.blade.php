@extends('forum.layouts.app')

@push('css')
<style>
    .well-social-post {
        border-radius: 0;
        background-color: #ffffff;
        border: 1px solid #ddd;
        padding:0;
    }

    .well-social-post .glyphicon,
    .well-social-post .fa,
    .well-social-post [class^='icon-'],
    .well-social-post [class*='icon-'] {
        font-weight: bold;
        color: #999999;
    }

    .well-social-post a,
    .well-social-post a:hover,
    .well-social-post a:active,
    .well-social-post a:focus {
        text-decoration: none;
    }

    .well-social-post .list-inline {
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .well-social-post .list-inline li {
        position: relative;
    }

    .well-social-post .list-inline li.active::after {
        position: absolute;
        display: block;
        width: 0;
        height: 0;
        content: "";
        top: 30px;
        left: 50%;
        left: -webkit-calc(50% - 5px);
        left: -moz-calc(50%-5px);
        left: calc(50% - 5px);
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #dddddd;
    }

    .well-social-post .list-inline li.active a {
        color: #222222;
        font-weight: bold;
    }

    .well-social-post .form-control {
        width: 100%;
        min-height: 100px;
        border: none;
        border-radius: 0;
        box-shadow: none;
    }

    .well-social-post .list-inline {
        padding: 10px;
    }

    .well-social-post .list-inline li + li {
        margin-left: 10px;
    }

    .well-social-post .post-actions {
        margin: 0;
        background-color: #f6f7f8;
        border-top-color: #e9eaed;
    }
</style>
@endpush

@section('forum')
<div class="row d-flex justify-content-center px-5">

    <form method="POST" action="{{asset('forum/post/store')}}" class="form-card" enctype="multipart/form-data">
        @csrf
        <select class="form-select mb-5" name="forum" aria-label="Default select example">
            <option disabled="true" selected>Select Forum</option>
            @foreach($forums as $forum)
            <option value="{{$forum->id}}">{{$forum->title}}</option>
            @endforeach
        </select>
        <div class="well row">
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
        <div class="well well-sm well-social-post row">
            <textarea class="form-control" name="content" placeholder="What's in your mind?"></textarea>
            <ul class='list-inline post-actions'>
                <li class='pull-right text-right'><a href="#">
                        <button class="btn orange-btn square-btn border-0" type="submit">Post</button>
                    </a>
                </li>
            </ul>
        </div>
    </form>

</div>
@endsection