@extends('layouts.main')
@section('content')

<div class="container my-5 pt-5">
    <div>
        <h1>Reservation Successful</h1>
        <p>Your reservation details:</p>
        <ul>
            <li>Room Number: {{ $reservation->room_number }}</li>
            <li>Check-in Date: {{ $reservation->check_in_date }}</li>
            <li>Check-out Date: {{ $reservation->check_out_date }}</li>
        </ul>
        <p>Thank you for choosing Star hotel. We look forward to welcoming you!</p>
    </div>
</div>
@endsection