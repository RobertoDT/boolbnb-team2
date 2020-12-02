<header class="height_header_general">
    <div id="app" class="scroll">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- logo --}}
                <div class="logo-img">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('img/cover.png')}}" alt="Logo Boolbnb">
                    </a>
                </div>
                {{-- input di ricerca --}}                 
                <div class="start_search form-inline my-2 my-lg-0">                     
                    <input type="search" id="address" value="{{isset($address) ? $address : ''}}" class="form-control" placeholder="Where are we going?" />                 
                </div>
                <div class="start_search form-inline my-2 my-lg-0">
                    <button id="search" class="btn btn-dark my-2 my-sm-0 modifing_link">Search</button>
                </div>

                {{-- fine input di ricerca --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                {{-- Icona filtro --}}
                <div class="filter">
                    <i class="fas fa-filter funnel"></i>
                </div>
                {{-- /Icona filtro --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} {{Auth::user()->lastname}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('admin.properties.index')}}">I miei appartamenti<i class="fas fa-home"></i></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="filter_container d-none">
            {{-- Prendo gli extra, li ciclo e li inserisco nella parte bassa dell'header --}}
            @foreach ($extras as $extra)
            <div class="small_filter_container">
                <label for="{{$extra->id}}"> {{$extra->name}}</label>
                <input type="checkbox" name="extras[]" id="{{$extra->id}}" value="{{$extra->id}}" {{ (is_array(old('extras')) and in_array($extra_id, old('extras'))) ? ' checked' : '' }}>
            </div>
            {{-- Prendo gli extra, li ciclo e li inserisco nella parte bassa dell'header --}}
            @endforeach
            {{-- Barra per selezionare la distanza dalla search--}}
            <div class="bar_tab width_30">
                <div class="bar_up width_25">
                  <div class="bar_up overlay_green"></div>
                </div>
              </div>
            {{-- barra per selezionare la distanza dalla search--}}
          </div>
    </div>
</header>
