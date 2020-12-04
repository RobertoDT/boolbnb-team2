@extends('layouts.main')

@section('title')
    Admin Property Details
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="detail">
    <div class="background-wrapper">
        <div class="wrap">

            {{-- IMMAGINE COPERTINA E TITOLO --}}
            <div class="title-wrap"> 
                <h1>Il tuo appartamento: <br> "{{$property->title}}"</h1>
                <div class="img-wrapper"> 
                    <img class="img-admin" src="{{asset('storage/'.$property->flat_image)}}" alt="Logo immagine">
                </div>
            </div>
            {{-- //IMMAGINE COPERTINA E TITOLO --}}



            {{-- DETTGLI STRUTTURA --}}
            <div class="apt-details">
                <button type="submit" class="btn modifing_link menu-btn">Menu</button>
                {{-- DESCRIZIONE --}}
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
                </div>
                {{-- //LOCALI --}}

                {{-- EXTRA --}}
                <div class="extras">
                    <div>
                        @if($property->extras->isEmpty())
                        <p>Non hai inserito extra</p>
                        @else
                            <h5>I tuoi Extra</h5>
                                @foreach ($property->extras as $extra)
                                    <p><i class="far fa-star"></i> {{$extra->name}}</p>
                                @endforeach
                        @endif
                    </div>
                </div>
                {{-- //EXTRA --}}    

            </div>
            {{-- //DETTGLI STRUTTURA --}}

        </div>

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
@endsection
