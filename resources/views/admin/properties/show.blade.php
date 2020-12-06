@extends('layouts.main')

@section('title')
    Admin Property Details
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="detail">

    <div class="background-wrapper">

        <div class="wrap">


            {{-- NAVBAR --}}
            <div class="menu-admin">
                <ul>
                    <li id="menu-item"><a href="{{route('admin.properties.edit', $property)}}"><i class="fas fa-pencil-alt"></i> <span>Modifica</span></a></li>
                    <li id="menu-item">
                        <form class="" action="{{route("admin.properties.destroy", $property)}}" method="POST">
                            @csrf
                            @method("DELETE")
                           <a href=""><i class="fas fa-trash-alt"></i> <span>Elimina</span></a>
                        </form>
                    </li>
                    <li id="menu-item"><a href="{{route("admin.properties.index")}}"><i class="fas fa-eye"></i> <span>Visibilita'</span></a></li>
                    <li id="menu-item"><a href="{{route("admin.properties.index")}}"><i class="fas fa-chart-bar"></i> <span>Statistiche</span></a></li>
                    <li id="menu-item"><a href="{{route("admin.properties.index")}}"><i class="fas fa-user"></i> <span>Torna Indietro</span></a></li>
                </ul>

            {{-- IMMAGINE COPERTINA E TITOLO --}}
            <div class="title-wrap">
                <h1>Il tuo appartamento: <br> "{{$property->title}}"</h1>
                <div class="img-wrapper">
                    <img class="img-admin" src="{{asset('storage/'.$property->flat_image)}}" alt="Logo immagine">
                </div>

            </div>
            {{-- //NAVBAR --}}

            {{-- MAIN --}}
            <div class="main-layout">

                {{-- DESCRIZIONE --}}

                <div class="sezione side">
                    <div class="desc">
                        <h5><i class="fas fa-door-open"></i> La tua descrizione: </h5>
                            <p>{{$property->description}}</p>
                    </div>
                </div>
                {{-- //DESCRIZIONE --}}
            
            
                {{-- IMMAGINE COPERTINA E TITOLO --}}
                <div class="sezione title-wrap">
                    <h1>Il tuo appartamento: <br> "{{$property->title}}"</h1>
                    <div class="img-wrapper">
                        <img class="img-admin" src="{{asset('storage/'.$property->flat_image)}}" alt="Logo immagine">
                    </div>
                </div>
                {{-- //IMMAGINE COPERTINA E TITOLO --}}
            
                {{-- EXTRA --}}
                <div class="sezione side">
                    <div class="feat">
                        <h5>Le tue Caratteristiche:</h5>

                <div class="desc">
                    <div>
                    <h6><i class="fas fa-door-open"></i> La tua descrizione: {{$property->description}}</h6>
                    </div>
                </div>
                {{-- //DESCRIZIONE --}}

                {{-- LOCALI --}}
                <div class="feat">
                    <div>
                        <h5>Le tue Caratteristiche</h5>

                        <h6><i class="fas fa-home"></i> Locali: {{$property->rooms_number}}</h6>
                        <h6><i class="fas fa-bed"></i> Letti: {{$property->beds_number}}</h6>
                        <h6><i class="fas fa-shower"></i> Bagni: {{$property->bathrooms_number}}</h6>
                        <h6><i class="fas fa-th"></i> Metri Quadri: {{$property->square_meters}}</h6>
                    </div>

                    <div class="extras">

                </div>
                {{-- //LOCALI --}}

                {{-- EXTRA --}}
                <div class="extras">
                    <div>

                        @if($property->extras->isEmpty())
                            <p>Non hai inserito extra</p>
                        @else
                            <h5>I tuoi Extra:</h5>
                                @foreach ($property->extras as $extra)
                                    <p><i class="far fa-star"></i> {{$extra->name}}</p>
                                @endforeach
                        @endif
                    </div>                  
                </div>

             {{-- //EXTRA --}}
            

                {{-- //EXTRA --}}


            </div>
            {{-- //MAIN --}}
            
                
            {{-- INFORMATIONS AND MAP --}}
            <div class="info-mappa">
                {{-- ADDRESS --}}
                <div class="indirizzo">
                    <h5>Il tuo indirizzo: Via ciao 43, 75584 Roma</h5>
                </div>
                {{-- //ADDRESS --}}
        
                {{-- MAP  --}}
                <div class="container-mappa">
                    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
                    <div id="map-example-container-paris"></div>
                    {{-- <input type="hidden" id="input-map-paris"/> --}}
                    <input type="hidden" id="input-map-paris">
                    {{-- prendiamo coordinate da $property --}}
                    <input type="hidden" id="latitude" value="{{$property->latitude}}">
                    <input type="hidden" id="longitude" value="{{$property->longitude}}">
                </div>
                {{-- /MAP  --}}
            </div>    
            {{-- /INFORMATIONS AND MAP --}}   

        </div>
        {{-- //wrap --}}


    </div> 
    {{-- //background-wrapper --}}

    </div>

    {{-- MAPPA --}}
    <div class="wrapper">
        <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>

        <div id="map-example-container-paris"></div>
        <input type="hidden" id="input-map-paris" class="form-control" placeholder="Find a street in Paris, France. Try &quot;Rivoli&quot;" />

        {{-- prendiamo coordinate da $property --}}
        <input type="hidden" id="latitude" value="{{$property->latitude}}">
        <input type="hidden" id="longitude" value="{{$property->longitude}}">
    </div>
    {{-- //MAPPA --}}


</section>
<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
@endsection
