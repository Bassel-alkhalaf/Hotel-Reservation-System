@extends('layouts.main')
@section('content')
<div class="container my-5">
    <h1 class="mb-5 text-center">Rooms</h1>

    <div class="row">
        @foreach ($rooms as $room)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $room['title'] }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Room Number: {{ $room['room_number'] }}</h6>
                    <p class="card-text">Rate: {{ $room['rate'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


