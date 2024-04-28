@extends('layouts.main')
@section('content')

<div class="container my-5 pt-5">
    <h1>Welcome {{ Auth::user()->first_name }}</h1>

    <h3>My Reservations</h3>

    @foreach($userReservations as $reservation)
        <ul>
            <li>Room Number: {{ $reservation->room_number }}</li>
            <li>Check-in Date: {{ $reservation->check_in_date }}</li>
            <li>Check-out Date: {{ $reservation->check_out_date }}</li>
        </ul>
    @endforeach

</div>
@endsection