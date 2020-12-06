<header class="height_header_general">
    <div class="scroll down fixed_search">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                {{-- logo --}}
                <div class="logo-img">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('img/cover.png')}}" alt="Logo Boolbnb">
                    </a>
                </div>
                {{-- input di ricerca --}}                 
                {{-- <div class="start_search order form-inline my-2 my-lg-0">                     
                    <input type="search" id="address" value="{{isset($address) ? $address : ''}}" class="form-control" placeholder="Where are we going?" />                 
                </div>
                <div class="start_search form-inline my-2 my-lg-0">
                    <button id="search" class="btn btn-dark my-2 my-sm-0 modifing_link">Search</button>
                </div> --}}
                {{-- INPUT SEARCH --}}             
                <div class="start_search order">                 
                    <form class="form-inline my-2 my-lg-0" action="{{route("search")}}" method="GET">                     
                        @method('GET')                 
                        <div class="div_search form-inline my-2 my-lg-0">                     
                            <input class="form-control mr-sm-2 input_search" type="search" id="address" name="search" placeholder="Where are we going?" />                 
                        </div>                 
                        <button class="btn btn-dark my-2 my-sm-0 modifing_link search_write"  class="search_button" type="submit">Search</button>
                        <!-- {{-- Icona filtro --}} -->
                        <button type="button" class="btn filter_button" data-toggle="modal" data-target="#myModal">
                        </button>
                        <!-- {{-- /Icona filtro --}} -->
                    {{-- Icona filtro --}}
                        {{-- <div class="filter">
                            <i class="fas fa-filter funnel"></i>
                        </div> --}}
                    {{-- /Icona filtro --}}
                    </form>
                </div>

                {{-- fine input di ricerca --}}
                <button class="navbar-toggler bars" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                

                <div class="collapse navbar-collapse clearfix">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto float-right text-right">
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
                            <li class="nav-item dropdown width_100 m_0 p_5">
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
                {{-- nostro menu dropdown --}}
                <div class="collapse hamburger clearfix" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto float-right text-right">
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
                            <li class="nav-item">
                                    
                                    <a class="dropdown-item" href="{{route('admin.properties.index')}}">My apartments</a>
                                </li>
                            <li class="nav-item">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                {{-- /nostro menu dropdown --}}
            </div>
        </nav>
    </div>
        {{-- Modale filtri --}}
        <div class="modal fade filter_container" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Filters</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- {{-- Barra per filtrare --}} -->
                        <div class="container-fluid">
                            <div class="row symbol_filters">
                                @foreach ($extras as $extra)
                                    <div class="col-2 small_filter_container {{$extra->name}}" data-toggle="tooltip" data-placement="top" title="{{$extra->name}}">
                                        <label for="{{$extra->name}}"></label>
                                            <label class="switch">
                                            <input type="checkbox" name="extras[]">
                                            <span class="slider round"></span>
                                        </label>                            
                                    </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-center rooms_line"> 
                                    <!-- {{-- Barra per selezionare la distanza dalla search--}} -->
                                    <div class="col-2 small_filter_container text_size">
                                        <label for="rooms_number">Rooms</label>
                                        <input type="number" id="rooms_number" name="rooms_numebr" min="1" max="15">
                                    </div>
                                    <div class="col-2 small_filter_container text_size">
                                        <label for="beds_number">Beds</label>
                                        <input type="number" id="beds_number" name="beds_number" min="1" max="20">
                                    </div>
                                    <div class="col-2 small_filter_container text_size square_meters">
                                        <label for="square_meters">Square meters</label>
                                        <input type="number" id="square_meters" name="square_meters" min="1" max="1000">
                                    </div>
                                    <div class="col-2 small_filter_container text_size">
                                        <label for="bathrooms_number">Bathrooms</label>
                                        <input type="number" id="bathrooms_number" name="bathrooms_number" min="1" max="5">
                                    </div>
                            </div>
                            <div class="row distance_row">
                                <!-- {{-- barra per selezionare la distanza dalla search--}} -->
                                <div  class= "col-4 text-center small_filter_container text_size">
                                    <label for="distance">Distance</label>
                                    <input type="range" value ="20" id="distance" name="distance"
                                        min="5" max="100">
                                <!-- {{--/ barra per selezionare la distanza dalla search--}} -->
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn modifing_link">Show result</button>
                    </div>
                    </div>
                </div>
            </div>
        {{-- /Modale filtri --}}
</header>
