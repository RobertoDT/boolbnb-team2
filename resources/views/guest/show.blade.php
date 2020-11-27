@extends('layouts.main')

@section('title')
    Property Details
@endsection

@section('mainContent')
<section class="detail">
    <div class="wrapper">

        {{-- DETTGLI STRUTTURA --}}
        <div class="property-details">

            {{-- IMMAGINE COPERTINA E TITOLO --}}
            <div class="title-wrapper"> 
                <div class="img-container"> 
                    <img class="img-show" src="{{$property->flat_image}}" alt="">
                </div>
                <h1>{{$property->title}}</h1>
                
                <!-- BOTTONE -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Invia un messaggio alla struttura
                </button>
                <!-- //BOTTONE -->
  
                <!-- MODALE FORM MESSAGGIO -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form di Contatto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                            <!-- FORM -->
                            <div class="modal-body form-container">
                                <form action="action_page.php">
                                    <label for="fname">Nome</label>
                                    <input type="text" id="fname" name="firstname" placeholder="Nome">
                    
                                    <label for="lname">Cognome</label>
                                    <input type="text" id="lname" name="lastname" placeholder="Cognome">
            
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" placeholder="Indirizzo Email">
                                    {{-- @if (Auth::check()) value="{{$email}}" @endif --}}
        
                                    <label for="subject">Messaggio</label>
                                    <textarea id="subject" name="subject" placeholder="Scrivi qualcosa..." style="height:200px"></textarea> 
                                </form>
                            </div>
                            <!-- //FORM -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Invia</button>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- //MODALE FORM MESSAGGIO -->
            
            </div>
            {{-- //IMMAGINE COPERTINA E TITOLO --}}

            {{-- DESCRIZIONE --}}
            <div class="description">
                <div>
                <h6><i class="fas fa-door-open"></i> {{$property->description}}</h6>  
                </div>
            </div>
            {{-- //DESCRIZIONE --}}
        
            {{-- LOCALI --}}
            <div class="features">
                <div>
                    <h5>Caratteristiche</h5>
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
                    <p>non ci sono extra</p>
                    @else
                        <h5>Extra</h5>
                            @foreach ($property->extras as $extra)
                                <p><i class="far fa-star"></i> {{$extra->name}}</p>
                            @endforeach
                    @endif
                </div>
            </div>
            {{-- //EXTRA --}}    

        </div>
        
        {{-- MAPPA --}}
        <div class="map-container">
            <h2>Indirizzo e geolocalizzazione</h2>
            <h5><i class="fas fa-map-marker-alt"></i> Viale Italia 78, 78000 Pistoia</h5>
                <div class="map"></div>
                {{-- <h4>{{$property->address}}</h4> --}}
        </div>
        {{-- MAPPA --}}

    </div>
    {{-- //DETTGLI STRUTTURA --}}
</section>
@endsection