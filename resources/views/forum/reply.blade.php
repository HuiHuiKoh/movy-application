@extends('forum.layouts.app')

use Illuminate\Support\Facades\Auth;

@section('forum')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
            @if (\Session::has('success'))
            <div class="alert alert-success" role="alert">
                {!! \Session::get('success') !!}
            </div>
            @endif

            @foreach($threads as $thread)
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-start align-items-center">
                        <div>
                            <h6 class="fw-bold font-softOrange mb-1">{{$thread->name}}</h6>
                            <p class="text-muted small mb-0">
                                {{Carbon\Carbon::parse($thread->created_at)->format('M Y')}}
                            </p>
                        </div>
                    </div>

                    <p class="mt-3 mb-4 pb-2">
                        {{$thread->content}}
                    </p>

                    @if($replies!=null)
                    @foreach($replies as $reply)
                    <div class="row d-flex justify-content-center">
                        <div class="card text-dark">
                            <div class="card-body">
                                <div>
                                    <form method="POST" action="{{action('\App\Http\Controllers\ForumController@deleteReply',$reply->id)}}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn square-btn float-end" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                    </form>
                                    <h6 class="fw-bold mb-1">{{$reply->name}}</h6>
                                    <div class="d-flex align-items-center mb-3">
                                        <p class="mb-0">
                                            {{Carbon\Carbon::parse($reply->created_at)->format('M d, Y')}}
                                        </p>
                                        <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                        <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                        <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                                    </div>
                                    <p class="mb-0">
                                        {{$reply->content}}
                                    </p>
                                </div>
                            </div>
                            <hr class="my-0" />
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <form method="POST" action="{{action('\App\Http\Controllers\ForumController@storeReply')}}" class="form-card" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex flex-start w-100">
                            <div class="form-outline w-100">
                                <textarea class="form-control" name="content" id="textAreaExample" rows="4"
                                          style="background: #fff;"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="thread" value="{{$thread->id}}">
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection