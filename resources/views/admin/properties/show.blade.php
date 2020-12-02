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
                    <div class="img-wrapper"> 
                        <img class="img-admin" src="{{asset('storage/'.$property->flat_image)}}" alt="Logo immagine">
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
                            <button type="button" class="btn modifing_link" class="card-link" data-toggle="modal" data-target="#myModal">Sponsorizza la struttura</button>
                          
                            <!-- MODALE -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                  <div class="modal-body">
                                    <h5>Scegli il tipo di sponsorizzazione:</h5>
                                    <div class="sponsor-offers">
                                        <input type="checkbox" name="sponsor1">
                                            <label for="sponsor1">2,99 € per 24 ore di sponsorizzazione</label>
                                                <br>
                                        <input type="checkbox" name="sponsor2">
                                            <label for="sponsor2">5,99 € per 72 ore di sponsorizzazione</label>
                                                <br>
                                        <input type="checkbox" name="sponsor3">
                                            <label for="sponsor3">9,99 € per 144 ore di sponsorizzazione</label>
                                                <br>
                                    </div>
                                    
                                    <div class="payment">
                                        <h5>Inserisci i dati per il pagamento con carta:</h5>
                                        <div class="modal-body form-container">
                                            <form action="action_page.php">
                                                
                                                <label for="fname">Nome e Cognome dell'intestatario</label>
                                                <input type="text" name="fullname" placeholder="Nome Cognome">

                                                <label for="cardnumber">Numero della carta</label>
                                                <input type="text" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">

                                                <label for="expiry">Scadenza</label>
                                                <input placeholder="MM/YY" type="text" name="expiry">

                                                <label for="cvv">Codice di sicurezza</label>
                                                <input type="text" inputmode="numeric" pattern="[0-9\s]{3,4}" autocomplete="ccv" maxlength="4" placeholder="xxx">
                                        </div>
                                    </div>
                                  </div>

                                  <button type="submit" class="btn modifing_link proceed-btn">Procedi</button>

                                </div>
                              </div>
                            </div>
                            <!-- //MODALE -->
                          {{-- //SPONSOR --}}

                    </div>
                    <!-- //BOTTONI -->
                
                </div>
                {{-- //IMMAGINE COPERTINA E TITOLO --}}

            </div>
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
