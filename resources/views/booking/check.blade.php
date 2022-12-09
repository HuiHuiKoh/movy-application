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
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $result = 0; ?>
@for($i=0;$i< count($tickets);$i++)
            <tr>
                <th scope="row"><?php echo ++$result; ?></th>
                <td>
                    {{$tickets[$i]->name}}
                </td>
                <td>
                    {{$showtimes[$i]->name}}

                </td>
                <td>
                    {{$showtimes[$i]->hall}}
                </td>
                <td>
                    {{Carbon\Carbon::parse($showtimes[$i]->dateTime)->format('d M Y')}}
                </td>
                <td>
                    {{Carbon\Carbon::parse($showtimes[$i]->dateTime)->format('h:i a')}}
                </td>
                <td>
                    @foreach($seats as $seat)
                    @if($seat->ticket_id == $tickets[$i]->id)
                    {{$seat->row}}{{$seat->number}}
                    @endif
                    @endforeach
                </td>
                <td class="text-center">
                    <a class="btn orange-outline-btn m-0" href="{{ asset('payment/ticket'.$tickets[$i]->id) }}">Print Ticket</a>
                </td>
            </tr>
@endfor
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