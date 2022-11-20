@extends('layouts.app', ['pageTitle'=>'Booking'], ['title'=>'Booking'])

@section('content')
<section id="homepage" class="pricing">
    <div class="container">
        <div>
            <button type="button" class="booking-date btn orange-outline-btn px-5 py-1 mx-2 text-uppercase">
                <div>Today</div><div>20-nov</div>
            </button>
            <button type="button" class="booking-date btn orange-outline-btn px-5 py-1 mx-2 text-uppercase">
                <div>Sun</div><div>21-nov</div>
            </button>
            <button type="button" class="booking-date btn orange-outline-btn px-5 py-1 mx-2 text-uppercase">
                <div>Mon</div><div>22-nov</div>
            </button>
        </div>
        <div>
            <h2 class="font-weight-bold">Movy Bukit Tinggi</h2>
            <h2 class="font-weight-bold">Movy 1 Utama</h2>
            <h2 class="font-weight-bold">Movy Rawang</h2>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
//    Make training programme button active
    let dates = document.querySelectorAll(".booking-date");
    for (let date of dates) {
        date.addEventListener('click', (e) => {
            const et = e.target;
            $('.booking-date').parent().find('.orange-btn-active').removeClass('orange-btn-active');
            et.classList.add('orange-btn-active');
        });
    }
</script>
@endpush