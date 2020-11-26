{{-- <header>
    <div class="header-main-wrapper">
    <div class="header-wrapper">
    
        <div class="logo">
            <img class="logo_img" src="{{asset('img/logo.jpg')}}" alt="logo">
        </div>
        <div class="log-in flex-center position-ref">
            @if (Route::has('login'))
                <div class="header-menu top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>

                <div class="hamburger top-right links">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>  
                </div>
            @endif
        </div>

        </div>
    </div>
</header> --}}

{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
      <div class="logo">
        <img class="logo_img" src="{{asset('img/logo.jpg')}}" alt="logo">
      </div>
  
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
      </form> --}}


  {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
  {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"> 
            <div class="log-in flex-center position-ref">
            @if (Route::has('login'))
                <div class="header-menu top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
      
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
              </div>
            @endif
             <span class="sr-only">(current)</span></a>
        </li>

      </ul>

    </div>
  </nav>  --}}
