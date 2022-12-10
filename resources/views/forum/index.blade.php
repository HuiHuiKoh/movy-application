@extends('forum.layouts.app')

@section('forum')
<div class="container px-5">
    <h1 class="text-center shadow-lg" style="font-size: 2rem; text-shadow: 2px 2px 4px #000000;">Forum Topics</h1>
    @foreach($forums as $forum)
    <div class="card my-3 p-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 ml-4"><a href="{{asset('forum/thread/'.$forum->id)}}"><h6>{{$forum->title}}</h6></a></div>
                <div class="col-md-3"><i class="bi bi-chat mx-1" style="font-size: 20px"></i>10</div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection