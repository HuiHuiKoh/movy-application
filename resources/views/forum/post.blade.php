@extends('forum.layouts.app')

@section('forum')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="card text-dark">
                <div class="card-body p-5">
                    <h4 class="mb-0">My Posts</h4>
                    <p class="fw-light mb-4 pb-2"></p>
                    @if($threads!=null)
                    @foreach($threads as $thread)
                    
                    <li class="d-flex flex-start">
                        <div>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0">
                                    {{Carbon\Carbon::parse($thread->created_at)->format('M d, Y')}}
                                </p>
                                <a href="#!" class="link-muted"><i class="fas fa-pencil-alt ms-2"></i></a>
                                <a href="#!" class="link-muted"><i class="fas fa-redo-alt ms-2"></i></a>
                                <a href="#!" class="link-muted"><i class="fas fa-heart ms-2"></i></a>
                            </div>
                            <a href="{{asset('forum/reply/'.$thread->id)}}"><h6 class="mb-0 font-weight-normal">
                                {{$thread->title}}
                            </h6></a>
                        </div>
                    </li>
                    <hr/>
                    
                    @endforeach
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection