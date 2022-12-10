@extends('forum.layouts.app')

@section('forum')
<div class="container px-5">
    <h1 class="text-center shadow-lg" style="font-size: 2rem; text-shadow: 2px 2px 4px #000000;">Forum Topics</h1>
    @foreach($forums as $forum)
    <?php $count = 0; ?>
    @foreach($threads as $thread)
    <?php
    if ($thread->forum_id == $forum->id) {
        $count++;
    }
    ?>
    @endforeach
    <div class="card my-3 p-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 ml-4"><a href="{{asset('forum/thread/'.$forum->id)}}"><h6>{{$forum->title}}</h6></a></div>
                <div class="col-md-3 font-softOrange text-right"><i class="bi bi-chat mx-1" style="font-size: 20px"></i><?php echo $count ?></div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection