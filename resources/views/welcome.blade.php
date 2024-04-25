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
<div class="container">
    <div class="text-center py-5">
        <h2>Luxurious Accommodation</h2>
        <p>Indulge in our opulent rooms and suites, designed to 
            provide the utmost comfort and sophistication. Each 
            room boasts modern amenities, plush furnishings, and 
            panoramic views, inviting you to unwind in style.</p>
    </div>
</div>
<div class="container">
    <!-- Carousel wrapper -->
    <div id="carouselBasicExample" class="carousel slide carousel-fade p-5" data-mdb-ride="carousel" data-mdb-carousel-init>
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button
            type="button"
            data-mdb-target="#carouselBasicExample"
            data-mdb-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
            ></button>
            <button
            type="button"
            data-mdb-target="#carouselBasicExample"
            data-mdb-slide-to="1"
            aria-label="Slide 2"
            ></button>
            <button
            type="button"
            data-mdb-target="#carouselBasicExample"
            data-mdb-slide-to="2"
            aria-label="Slide 3"
            ></button>
        </div>

        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active">
            <img src="https://images.pexels.com/photos/261169/pexels-photo-261169.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Sunset Over the City"/>
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
            <img src="https://images.pexels.com/photos/1579253/pexels-photo-1579253.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Canyon at Nigh"/>
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
            <img src="https://images.pexels.com/photos/161758/governor-s-mansion-montgomery-alabama-grand-staircase-161758.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Cliff Above a Stormy Sea"/>
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselBasicExample" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        
    </div>
</div>
<!-- Carousel wrapper -->
</div>
<div class="container-fluid">
    <h2>Amenities</h2>
    <div class="col-lg-4 col-md-3 col-sm-2">
    <ul>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    </div>
</div>

@endsection