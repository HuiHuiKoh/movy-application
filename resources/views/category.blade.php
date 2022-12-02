
<link rel="stylesheet" href="{{asset('assets\css\showtimes.css')}}">
<nav class="movie-nav">
    <ul>
        @foreach($categories as $category)
        <li style="color: lightgoldenrodyellow;"><b><a href="{{url('showtimes/'.$category->id)}}">{{$category->category}}</a></b></li>
        @endforeach
    </ul>
</nav>