@extends('layouts.main')
@section('content')
  <!-- Background image -->
  <div
    class="text-center bg-image"
    style="
      background-image: url('https://images.pexels.com/photos/1134176/pexels-photo-1134176.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
      height: 400px;
      background-size: cover;
      background-position: center;
     
    "
  >
    <div class="mask h-100 w-100" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Welcome to Star Hotel
          </h1>
          <h4 class="mb-3">Plan your escape to Star Hote</h4>
          <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="#!" role="button"
          >Reserve Now</a
          >
        </div>
      </div>
    </div>
  </div>
  
  <!-- Background image -->
@endsection