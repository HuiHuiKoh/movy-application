@extends('layouts.app', ['pageTitle'=>'Check Booking'], ['title'=>'Check Booking'])

@section('content')
<section id="booking">
    @if($tickets!=null)
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Movie</th>
                <th scope="col">Cinema</th>
                <th scope="col">Hall</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Seat</th>
            </tr>
        </thead>
        <tbody>
            <?php $result = 0; ?>
            <tr>
                <th scope="row"><?php echo ++$result; ?></th>
                <td>@foreach($tickets as $ticket)
                    {{$ticket->name}}
                    @endforeach
                </td>
                <td>@foreach($showtimes as $show)
                    {{$show->name}}
                    @endforeach
                </td>
                <td>@foreach($showtimes as $show)
                    {{$show->hall}}
                    @endforeach
                </td>
                <td>@foreach($showtimes as $show)
                    {{Carbon\Carbon::parse($show->dateTime)->format('d M Y')}}
                    @endforeach
                </td>
                <td>@foreach($showtimes as $show)
                    {{Carbon\Carbon::parse($show->dateTime)->format('h:i a')}}
                    @endforeach
                </td>
                <td>@foreach($seats as $seat)
                    {{$seat->row}}{{$seat->number}}
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    @else
    <h6 class="text-center my-4">You have no booking
        <a href="{{asset('showtimes')}}">
            <button class="btn orange-btn">View Movies</button>
        </a>
    </h6>
    @endif
</section>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
@endpush