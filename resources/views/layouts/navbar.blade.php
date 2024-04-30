<nav class="navbar navbar-expand-lg navbar-light bg-body fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand px-3" href="{{ route('home') }}">Star Hotel</a>
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto px-3">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"
           data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal" id='showWeatherModalBtn' href="#"
           >
          Weather Info
          </a>
     
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('rooms') }}">Rooms</a>
        </li>
        @if (Auth::check())
              <li class="nav-item dropdown">
              <a
                data-mdb-dropdown-init
                class="nav-link dropdown-toggle d-flex align-items-center"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                aria-expanded="false"
              >
                <img
                  src="https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small/user-profile-icon-free-vector.jpg"
                  class="rounded-circle"
                  height="22"
                  alt="Portrait of a Woman"
                  loading="lazy"
                />
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li>
                  <span class="dropdown-item">Welcome, {{ Auth::user()->first_name }}</span>
                </li>
                <li>
                <a class="dropdown-item" href="{{ route('my_profile') }}">My profile</a>
                </li>
                <li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                      <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
              </ul>
            </li>
                @else
                    <!-- Display sign-in button if user is not logged in -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sign_in') }}">Sign In</a>
                    </li>
                @endif
      </ul>
    </div>
  </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var showWeatherModalBtn = document.getElementById("showWeatherModalBtn");

        showWeatherModalBtn.addEventListener("click", function() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "{{ route('weather') }}", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        var modalContent = '<div class="modal-content text-center">';
                        Object.keys(response).forEach(function(date) {
                            var weatherData = response[date];
                            modalContent += '<h4>' + weatherData.day + ' - ' + date + '</h4>';
                            modalContent += '<p>' + weatherData.description + '</p>';
                            modalContent += '<p>' + weatherData.temperature + '°C</p>';
                            modalContent += "</hr>";
                        });
                        modalContent += '</div>';

                        var weatherModalBody = document.getElementById("weatherModalBody");
                        weatherModalBody.innerHTML = modalContent;
                        
                    } else {
                        console.error("Error fetching weather forecast:", xhr.status);
                    }
                }
            };
            xhr.send();
        });
    });
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Weather Forecast In Montreal</h5>
            <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="weatherModalBody">
       
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>          </div>
        </div>
      </div>
    </div>