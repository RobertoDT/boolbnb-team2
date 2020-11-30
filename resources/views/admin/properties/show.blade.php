@extends('layouts.main')

@section('title')
    Admin Property Details
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="detail">
    <div class="background-wrapper">
        <div class="wrapper">

            {{-- DETTGLI STRUTTURA --}}
            <div class="property-details">

                {{-- IMMAGINE COPERTINA E TITOLO --}}
                <div class="title-wrapper"> 
                  <h1>Il tuo appartamento "{{$property->title}}"</h1>
                    <div class="img-container"> 
                        <img class="img-show" src="{{$property->flat_image}}" alt="">
                    </div>
                    
                    
                    <!-- BOTTONI -->
                    <div class="buttons">
                      <div class="card-body text_center">

                        {{-- MODIFICA --}}
                        <a class="btn modifing_link" href="{{route('admin.properties.edit', $property)}}" class="card-link">Modifica informazioni</a>
                        {{-- MODIFICA --}}
                        
                        <!-- ELIMINA -->
                        <form class="" action="{{route("admin.properties.destroy", $property)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            
                            <button type="submit" class="btn modifing_link">Cancella la struttura</button>
                        </form>
                        <!-- /ELIMINA -->
                        
                        {{-- STATISTICHE --}}
                        <a class="btn modifing_link" class="card-link">Statistiche della struttura</a>
                        {{-- //STATISTICHE --}}

                        {{-- SPONSOR --}}
                        <a class="btn modifing_link" class="card-link">Sponsorizza la struttura</a>
                        {{-- //SPONSOR --}}
                        </div>
                      </div>
                    <!-- //BOTTONI -->
                
                </div>
                {{-- //IMMAGINE COPERTINA E TITOLO --}}

                {{-- DESCRIZIONE --}}
                <div class="description">
                    <div>
                    <h6><i class="fas fa-door-open"></i> La tua descrizione: {{$property->description}}</h6>  
                    </div>
                </div>
                {{-- //DESCRIZIONE --}}
            
                {{-- LOCALI --}}
                <div class="features">
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
                <div class="extra">
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

        <div class="wrapper">
            {{-- MAPPA --}}
            <div class="map-container">
                <h2>Indirizzo e geolocalizzazione</h2>
                <h5><i class="fas fa-map-marker-alt"></i> Viale Italia 78, 78000 Pistoia <a class="btn modifing_link" href="{{route('admin.properties.edit', $property)}}" class="card-link">Modifica l'indirizzo</a> </h5>
                
                    <div class="map"></div>
                    {{-- <h4>{{$property->address}}</h4> --}}
            </div>
            {{-- MAPPA --}}
        </div>
    

</section>
@endsection
=======
>>>>>>> Stashed changes

    <button type="submit" class="btn btn-danger">ELIMINA PROPRIETA'</button>
  </form>
  <!-- /form di eliminazione proprietà -->
