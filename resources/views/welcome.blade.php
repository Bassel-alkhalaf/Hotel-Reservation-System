@extends('layouts.main')
@section('content')
  <!-- Background image -->
  <div
    class="text-center bg-image"
    style="
      background-image: url('https://images.pexels.com/photos/1134176/pexels-photo-1134176.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
      height: 100vh;
      background-size: cover;
      background-position: center;
     
    "
  >
    <div class="mask h-100 w-100" style="background-color: rgba(0, 0, 0, 0.6);">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Welcome to Star Hotel
          </h1>
          <h4 class="mb-3">Plan your escape to Star Hotel</h4>
          <a data-mdb-ripple-init class="btn btn-outline-light btn-lg" href="{{ route('rooms') }}" role="button"
          >Reserve Now</a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Background image -->
<div class="container">
    <div class="text-center py-5">
        <h2>Luxurious Accommodation</h2>
        <p>Indulge in our opulent rooms and suites, designed to 
            provide the utmost comfort and sophistication. Each 
            room boasts modern amenities, plush furnishings, and 
            panoramic views, inviting you to unwind in style.</p>
    </div>
</div>
  
<div id="carouselExampleCrossfade" class="carousel slide carousel-fade py-5 w-50 mx-auto" data-mdb-ride="carousel" data-mdb-carousel-init>
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
    <div class="carousel-item active">
    <img src="https://images.pexels.com/photos/261169/pexels-photo-261169.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Sunset Over the City"/>    </div>
    <div class="carousel-item">
    <img src="https://images.pexels.com/photos/1579253/pexels-photo-1579253.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Canyon at Nigh"/>    </div>
    <div class="carousel-item">
    <img src="https://images.pexels.com/photos/161758/governor-s-mansion-montgomery-alabama-grand-staircase-161758.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Cliff Above a Stormy Sea"/>    </div>
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

<!-- Carousel wrapper -->
</div>
<div class="container-fluid mx-auto w-75">
    <h2>Featured Amenities: </h2>
    <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12">
    <ul class="list-unstyled p-2">
        <li class="py-2"><i class="fas fa-seedling me-2"></i>Sustainability</li>
        <li class="py-2"><i class="far fa-building me-2"></i>Meeting Space</li>
        <li class="py-2"><i class="fas fa-check me-2"></i>Convenience Store</li>
    </ul>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
    <ul class="list-unstyled p-2">
        <li class="py-2"><i class="fas fa-utensils me-2"></i>Restaurant</li>
        <li class="py-2"><i class="fas fa-wifi me-2"></i>Free Wifi</li>
        <li class="py-2"><i class="fas fa-dumbbell me-2"></i>Fitness Center</li>
    </ul>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
    <ul class="list-unstyled p-2">
        <li class="py-2"><i class="fas fa-mug-hot me-2"></i>Free Coffee/Tea</li>
        <li class="py-2"><i class="fas fa-gift me-2"></i>Gift Shop</li>
        <li class="py-2"><i class="fas fa-soap me-2"></i>Dry Cleaning Service</li>
    </ul>
    </div>
    </div>
    <div class="row">
    <h2>Hotel Information: </h2>
    <div class="col-lg-4 col-md-6 col-sm-12">
    <ul class="list-unstyled p-2">
        <li class="py-2"><i class="far fa-clock me-2"></i>Check-in: 3:00 pm</li>
        <li class="py-2"><i class="far fa-clock me-2"></i>Check-out: 12:00 pm</li>
        <li class="py-2"><i class="fas fa-ban-smoking me-2"></i>Smoke Free Property</li>
    </ul>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
    <ul class="list-unstyled p-2">
        <li class="py-2"><i class="fas fa-paw me-2"></i><b>Pet Policy</b></li>
        <small>Maximum Pet Weight: 50lbs<br>
            Maximum Number of Pets in Room: 2</small>
    </ul>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
    <ul class="list-unstyled p-2">
        <li class="py-2"><i class="fas fa-square-parking me-2"></i><b>Parking</b></li>
        <small>Complimentary On-Site Parking<br></small>
        <small>Long Term Parking</small>
    </ul>
    </div>
    </div>
</div>

<div class="container my-5 bg-secondary">
    <div class="row">
    <div class="col-lg-6 col-md-12 d-flex align-content-center">
        <div class="align-content-center">
        <p class="text-center p-4 text-light">From the moment you step foot into our elegant lobby, our dedicated staff are committed to 
            ensuring your stay exceeds expectations. Experience warm welcomes, personalized service, and attention to detail 
            that define the hallmark of hospitality at Star Hotel.</p>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 p-0">
    <div class="me-0">
        <img class="fluid-img mw-100" src="https://images.pexels.com/photos/258154/pexels-photo-258154.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Hotel image with a pool">
    </div>
    </div>
    </div>
</div>

@endsection