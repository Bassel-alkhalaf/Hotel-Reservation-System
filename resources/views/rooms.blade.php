@extends('layouts.main')
@section('content')

<div class="container my-5 pt-5">
    <h1 class="my-5 text-center">Our Rooms</h1>

    @error('error')
                <div class="alert alert-danger">{{ $message }}</div>
     @enderror
    
    @php
        // Group rooms by title
        $roomsByTitle = [];
        foreach ($rooms as $room) {
            $title = $room['title'];
            if (!array_key_exists($title, $roomsByTitle)) {
                $roomsByTitle[$title] = [];
            }
            $roomsByTitle[$title][] = $room;
        }
    @endphp

    @foreach ($roomsByTitle as $title => $rooms)     
        <div class="row"> 
            <div class="card mb-3">
                <div class="card-body row">
                <div class="col-md-12 col-lg-6">
                    <div id="carouselExampleCrossfade" class="carousel slide carousel-fade py-3 w-75 mx-auto" data-mdb-ride="carousel" data-mdb-carousel-init>
                        <div class="carousel-indicators">
                            <button
                            type="button"
                            data-mdb-target="#carouselExampleCrossfade"
                            data-mdb-slide-to="0"
                            class="active"
                            aria-current="true"
                            aria-label="Slide 1"
                            ></button>
                            <button
                            type="button"
                            data-mdb-target="#carouselExampleCrossfade"
                            data-mdb-slide-to="1"
                            aria-label="Slide 2"
                            ></button>
                            <button
                            type="button"
                            data-mdb-target="#carouselExampleCrossfade"
                            data-mdb-slide-to="2"
                            aria-label="Slide 3"
                            ></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-mdb-interval="2000">
                            <img src="https://images.pexels.com/photos/164595/pexels-photo-164595.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="A hotel room image"/>    </div>
                            <div class="carousel-item" data-mdb-interval="2000">
                            <img src="https://images.pexels.com/photos/237371/pexels-photo-237371.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="A hotel room image"/>    </div>
                            <div class="carousel-item" data-mdb-interval="2000">
                            <img src="https://images.pexels.com/photos/271639/pexels-photo-271639.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="A hotel room image"/>    </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCrossfade" data-mdb-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCrossfade" data-mdb-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="d-flex align-items-center h-100 ps-4">
                        <div class="w-100">
                            <h5 class="card-title">{{ $title }}</h5>
                            <p class="card-text">Rate: {{ $rooms[0]['rate'] }} per night</p>
                            @auth
                                <!-- Button to trigger modal -->
                                <button type="button" class="btn btn-primary" onclick="openModal('{{ $title }}')">Reserve</button>
                            @else
                                <!-- Link to sign in route -->
                                <a class="btn btn-primary" href="{{ route('sign_in') }}">Reserve</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
</div>

<!-- Modal HTML (hidden by default) -->
<div class="modal fade" id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reserveModalLabel"></h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ route('create_reservation') }}" method="POST">
                    @csrf

                    <input type="hidden" name="room_type" id="room_type">

                    <div class="mb-3">
                        <label for="dateIn" class="form-label">Check in Date</label>
                        <input type="date" class="form-control" name="check_in_date">
                    </div>

                    <div class="mb-3">
                        <label for="dateOut" class="form-label">Check out Date</label>
                        <input type="date" class="form-control" name="check_out_date">
                    </div>

               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Reserve</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript to open modal -->
<script>
    function openModal(title) {
        // Set the modal title dynamically
        document.getElementById('reserveModalLabel').innerText = title;

        document.getElementById("room_type").value = title;
        // Show the modal
        $('#reserveModal').modal('show');
    }
</script>
@endsection