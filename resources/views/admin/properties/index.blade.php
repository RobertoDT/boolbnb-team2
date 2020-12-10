<!-- pagina principale -->
@extends('layouts.main')

@include('layouts.header-general')

@section('mainContent')
<div class="container">

    <div class="container">
        <div class="row">
            <div class="container">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    @if(is_array(session('success')))
                        <ul>
                            @foreach (session('success') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @else
                        {{ session('success') }}
                @endif
            </div>
            @endif

            {{-- MENU A SINISTRA --}}
            <h1 class="menu-nav" onclick="openNav()">&#9776; menu</h1>

            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <a href="{{route("admin.properties.create")}}"><i class="fas fa-plus"></i> Aggiungi appartamento</a><hr>
              <a href="{{route("admin.sponsors.create")}}"><i class="fas fa-dollar-sign"></i> Sponsorizza il tuo appartamento</a><hr>
              <a href="{{route("admin.messages")}}"><i class="far fa-envelope"></i> Visualizza i tuoi messaggi</a><hr>
              <a href="{{ url('/') }}"><i class="fas fa-home"></i> Torna alla Homepage</a><hr>
              <a href="#"><i class="fas fa-phone"></i> Hai bisogno di assistenza? <br> Contattaci allo 0528463898 </a>
            </div>
            {{-- //MENU A SINISTRA --}}
        
            

            <div class="bg-color">
                <h1 class="apt-title">I miei appartamenti</h1>
                
                <ul class="flat_list">
            
                    {{-- Stampa della lista degli appartamenti --}}
                    @foreach ($properties as $property)

                    <li class="card-list">

                        <div class="card-box flip-card">

                            <div class="flip-card-inner">

                                {{-- FRONT --}}
                                <div class="flip-card-front">
                                    <img class="card-img-top" src="{{asset('storage/'.$property->flat_image)}}" alt="House Image">
                                    <div class="front-text">
                                        <h5 class="card-title text_center">{{$property->title}}, <br><span>{{$property->metropolis}}</span></h5>
                                    </div>
                                </div>
                                {{-- //FRONT --}}

                                {{-- BACK --}}
                                {{-- bottoni --}}
                                <div class="text_center flip-card-back">
                                    <div class="btn-wrapper">
                                        <a class="btn modifing_link" href="{{route('admin.properties.show', $property)}}" class="card-link">Mostra dettagli</a>
                                        <a class="btn modifing_link" href="{{route('admin.properties.edit', $property)}}" class="card-link">Modifica informazioni</a>
                                        <!-- form di eliminazione proprietà -->
                                        <form class="" action="{{route("admin.properties.destroy", $property)}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn modifing_link">Cancella appartamento</button>
                                        </form>
                                        <!-- /form di eliminazione proprietà -->
                                    </div>
                                </div>
                                {{-- //bottoni --}}
                                {{-- //BACK --}}

                            </div>

                        </div>
                    </li>
                    @endforeach
        </div>
        </ul>
    </div>
    </div>
<div>


@endsection
