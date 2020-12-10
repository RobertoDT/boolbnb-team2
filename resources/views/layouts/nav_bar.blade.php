<header class="bar_fixed">
    <div>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                {{-- logo --}}
                <div class="logo-img">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('img/cover.png')}}" alt="Logo Boolbnb">
                    </a>
                </div>
                {{-- input di ricerca --}}                 
                
                {{-- INPUT SEARCH --}}             
                <div class="start_search order">                 
                    <div class="header_nav form-inline my-2 my-lg-0">                                                         
                        <div class="div_search form-inline my-2 my-lg-0" id="search_navbar">                     
                            <input type="hidden" id="address-value">
                            <input type="hidden" id="foreign_address" value="{{isset($address) ? $address : ''}}">
                            <input type="search" class="address_search_input" id="address" value="{{isset($address) ? $address : ''}}" class="form-control" placeholder="Dove vuoi andare?" data-address="{{isset($address) ? $address : ''}}"/>
                        </div>                 
                        <button class="btn btn-dark my-2 my-sm-0 modifing_link search_write" id="search" class="search_button" type="submit">Cerca</button>
                        <!-- {{-- Icona filtro --}} -->
                        <button type="button" class="btn filter_button" data-toggle="modal" data-target="#myModal">
                        </button>
                        <!-- {{-- /Icona filtro --}} -->
                    </div>
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
                    <ul class="navbar-nav ml-auto float-right text-right li_width">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link mixin_font" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link mixin_font" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown width_100 m_0 p_5">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle mixin_font" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} {{Auth::user()->lastname}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('admin.properties.index')}}"> I miei appartamenti <i class="fas fa-home"></i></a>
                                    <a class="dropdown-item" href="{{route('admin.properties.create')}}">  Aggiungi appartamento <i class="fas fa-plus-circle"></i></a>
                                    <a class="dropdown-item" href="{{route('admin.sponsors.create')}}"> Sponsorizza appartamento <i class="fas fa-dollar-sign"></i></a>
                                    <a class="dropdown-item" href="{{route('admin.messages')}}"> Visualizza messaggi <i class="far fa-envelope"></i></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} 
                                        <i class="fas fa-sign-out-alt"></i>
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
                                    <a class="dropdown-item" href="{{route('admin.properties.index')}}">I miei appartamenti <i class="fas fa-home"></i></a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="dropdown-item" href="{{route('admin.properties.create')}}">Aggiungi appartamento <i class="fas fa-plus-circle"></i></a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="dropdown-item" href="{{route('admin.sponsors.create')}}">Sponsorizza appartamento <i class="fas fa-dollar-sign"></i></a>
                                </li>
                                <li class="nav-item"> 
                                    <a class="dropdown-item" href="{{route('admin.messages')}}">Visualizza messaggi <i class="far fa-envelope"></i></a>
                                </li>
                                <li class="nav-item">

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            <i class="fas fa-sign-out-alt"></i>
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
</header>
        {{-- Modale filtri --}}
        <div class="modal modal_dialog_responsive fade filter_container"id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Seleziona filtri</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- {{-- Barra per filtrare --}} -->
                        <div class="container-fluid">
                            <div class="row symbol_filters">
                                @foreach ($extras as $extra)
                                    <div class="col-md-2 col-sm-4 col-6 small_filter_container {{$extra->name}}" data-toggle="tooltip" data-placement="top" title="{{$extra->name}}">
                                        <label for="{{$extra->name}}"></label>
                                            <label class="switch">
                                            <input type="checkbox" id="{{$extra->name}}" value="{{$extra->id}}" name="extras[]">
                                            <span class="slider round"></span>
                                        </label>                            
                                    </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-center rooms_line"> 
                                    <!-- {{-- Barra per selezionare la distanza dalla search--}} -->
                                    <div class="col-sm-2 col-6 small_filter_container text_size text-center">
                                        <label for="rooms">Rooms</label>
                                        <input type="number" class="bg_transparent" placeholder ="1" id="rooms" value="1" name="rooms" min="1" max="15">
                                    </div>
                                    <div class="col-sm-2 col-6 small_filter_container text_size text-center">
                                        <label for="beds">Beds</label>
                                        <input type="number" class="bg_transparent" placeholder ="1" id="beds" value="1" name="beds" min="1" max="20">
                                    </div>
                                    <div class="col-sm-2 col-6 small_filter_container text_size text-center square_meters">
                                        <label for="mq">Mq</label>
                                        <input type="number" class="bg_transparent" placeholder ="30" id="mq" name="mq" data-mq ="" value="30" min="30" max="1000">
                                    </div>
                                    <div class="col-sm-2 col-6 small_filter_container text-center text_size">
                                        <label for="bathrooms">Bathrooms</label>
                                        <input type="number" class="bg_transparent" placeholder ="1" id="bathrooms" value="1" name="bathrooms" min="1" max="5">
                                    </div>
                            </div>
                            <div class="row distance_row">
                                <!-- {{-- barra per selezionare la distanza dalla search--}} -->
                                <div  class= "col-4 text-center small_filter_container text_size">
                                    <label for="radius">Distanza (km)</label>    
                                    <input type="range" value ="20" id="radius" name="radius"
                                        min="5" max="100" oninput="this.nextElementSibling.value = this.value">
                                    <output>20</output>
                                <!-- {{--/ barra per selezionare la distanza dalla search--}} -->
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="close set_filter" aria-label="Close" id="set_result" class="btn modifing_link">Salva</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- /Modale filtri --}}

