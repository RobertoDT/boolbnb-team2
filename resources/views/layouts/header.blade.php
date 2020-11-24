<header>
    <div class="header-wrapper">
    
        <div class="logo">
            <img class="logo-img" src="{{asset('img/logo.jpg')}}" alt="logo">
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

                <div class="hamburger top-right links d-none">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>  
                </div>
            @endif
        </div>

    </div>

</header>