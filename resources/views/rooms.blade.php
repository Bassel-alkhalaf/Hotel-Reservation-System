@extends('layouts.main')
@section('content')
<div class="container my-5">
    <h1 class="mb-5 text-center">Rooms</h1>
   

  @foreach ($rooms as $room)     
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
                            <h5 class="card-title">{{ $room['title'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Room Number: {{ $room['room_number'] }}</h6>
                            <p class="card-text">Rate: {{ $room['rate'] }}</p>
                            <a class="btn btn-primary btn-md" href="#">Select</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    @endforeach       
    
</div>

@endsection


