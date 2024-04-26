<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">Star Hotel</a>
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
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('rooms') }}">Rooms</a>
        </li>
        @if (Auth::check())
                    <!-- Display welcome message if user is logged in -->
                    <li class="nav-item">
                        <span class="nav-link">Welcome, {{ Auth::user()->first_name }}</span>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
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