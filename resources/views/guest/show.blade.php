@extends('layouts.main')

@section('title')
    Property Details
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="main-content">
    <div class="wrapper">

        @if(session('success_sent_message'))
            <div class="alert alert-success">
            {{session('success_sent_message')}}
            </div>
        @endif

            {{-- APARTMENT IMAGE --}}
            <div class="img-container">
                <img id="jumbo" class="img-show" src="{{asset('storage/'.$property->flat_image)}}" alt="Foto appartamento">
                    <span><p id="roma">{{$property->metropolis}}</p></span>
            </div> 
            <h1 class="guest-show-title">{{$property->title}}</h1>
            {{-- /APARTMENT IMAGE --}}

            {{-- MESSAGGIO --- SCSS BORDER IN GUEST INDEX--}}
            <div class="find guest-msg">
                <div class="find-border">
                <h2>Invia un messaggio al proprietario!</h2>
                    <div class="start_search order"> 
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="far fa-envelope fa-2x"></i></button>                
                    </div>
                </div>
            </div>
            {{-- MESSAGGIO --}}

            {{-- MODALE --}} 
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <!-- FORM -->
                            <div class="modal-body form-container">
                                <form action="{{route("messages.store", $property->id)}}" method="POST">

                                @csrf
                                @method("POST")

                                    <label for="email">Email</label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Indirizzo Email" required @if (Auth::check()) value="{{$email}}" @endif>
                                    <label for="text">Messaggio</label>
                                        <textarea class="form-control" id="text" name="text" placeholder="Scrivi messaggio..." style="height:200px" required>{{old("text") ?? old("text")}}</textarea>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Invia</button>
                                    </div>
                                </form>
                            </div>
                            <!-- //FORM -->
                        </div>
                    </div>
                </div>
            </div>
        <!-- //MODALE -->

        {{-- INFORMATIONS AND MAP --}}
            <div class="info-map">

                {{-- MAP  --}}
                <div class="container-map">
                    <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
                    <div id="map-example-container-paris"></div>
                    {{-- <input type="hidden" id="input-map-paris"/> --}}
                    <input type="hidden" id="input-map-paris">
                    {{-- prendiamo coordinate da $property --}}
                    <input type="hidden" id="latitude" value="{{$property->latitude}}">
                    <input type="hidden" id="longitude" value="{{$property->longitude}}">
                </div>
                {{-- /MAP  --}}
               
                
                {{-- DESCRIPTION --}}
                <div class="container-info">
                    <div class="description">
                        <h4>DESCRIZIONE</h4>
                        <h6>{{$property->description}}</h6>
                    </div>
                {{-- /DESCRIPTION --}}

                {{-- FEATURE-EXTRAS    --}}
                    <div class="features-extras">

                        {{-- FEATURES --}}
                        <div class="features">
                            <h4>CARATTERISTICHE</h4>
                            <h6><i class="fas fa-home gradient"></i> Locali: {{$property->rooms_number}}</h6>
                            <h6><i class="fas fa-bed gradient"></i> Letti: {{$property->beds_number}}</h6>
                            <h6><i class="fas fa-shower gradient"></i> Bagni: {{$property->bathrooms_number}}</h6>
                            <h6><i class="fas fa-th gradient"></i> Metri Quadri: {{$property->square_meters}}</h6>
                            {{-- /FEATURES --}}
                        </div>

                        {{-- EXTRAS --}}
                        <div class="extras">
                            @if($property->extras->isEmpty())
                            <p>Non ci sono extra</p>
                            @else
                                <h4>EXTRA</h4>
                                    @foreach ($property->extras as $extra)
                                        <p><i class="far fa-star gradient"></i> {{$extra->name}}</p>
                                    @endforeach
                            @endif
                        </div>
                        {{-- /EXTRAS --}}
                    </div>
                    {{-- /FEATURE-EXTRAS --}}
                </div>
            </div>     
        {{-- /INFORMATIONS AND MAP --}}  

        {{-- SPECIALE --}}
        <h1 class="sp-title">Cosa rende speciale BoolBnb</h1>
            <div class="special">
                <ul class="sp-list">
                    <li class="sp-container">
                        <div class="sp-image">
                            <img src="{{asset('img/sp1.jpg')}}" alt="special">
                        </div>
                        <div class="sp-text">
                            <h5>Una community di viaggi globale</h5>
                            <p>BoolBnb è disponibile in oltre 191 Paesi, dove i nostri Standard della community contribuiscono a promuovere la sicurezza e l'appartenenza di tutti.</p>
                        </div>
                    </li>
                    <li class="sp-container">
                        <div class="sp-image">
                            <img src="{{asset('img/sp2.jpg')}}" alt="special">
                        </div>
                        <div class="sp-text">
                            <h5>Host premurosi e affidabili</h5>
                            <p>Che si tratti di alloggi o di hotel, qualunque sia la tua destinazione gli host fanno di tutto per metterti a tuo agio</p>
                        </div>
                    </li>
                    <li class="sp-container">
                        <div class="sp-image">
                            <img src="{{asset('img/sp3.jpg')}}" alt="special">
                        </div>
                        <div class="sp-text">
                            <h5>Siamo qui per te, giorno e notte</h5>
                            <p>Il nostro servizio di assistenza internazionale, attivo 24 ore su 24, è disponibile in 11 lingue ed è pronto ad aiutarti ovunque ti trovi.</p>
                        </div>
                    </li>
                    <li class="sp-container">
                        <div class="sp-image">
                            <img src="{{asset('img/sp4.jpg')}}" alt="special">
                        </div>
                        <div class="sp-text">
                            <h5>Ogni viaggio è coperto da BoolBnb</h5>
                            <p>Le Condizioni di Rimborso Ospiti coprono molti problemi di viaggio, offrendo soluzioni come la prenotazione di un nuovo alloggio o il rimborso.</p>
                        </div>
                    </li>
                </ul>
            </div>
        {{-- //SPECIALE --}}

        
        {{-- FAQ --}}
        {{-- <div class="faq-container bootdey"> --}}
            <h1>FAQ</h1>
            <div class="gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="faq-card">
                        <div class="faq-card-body">
                            <div class="faq">

                                <div class="faq-row">
                                    <div class="faq-question">
                                        <h4>Cos'è un host?</h4>
                                    </div>
                                    <div class="faq-dot fb-bg"></div>
                                    <div class="faq-content">
                                        <p>Gli host sono ciò che rende speciale BoolBnb. Dietro ogni soggiorno c'è un host, una persona reale pronta a offrirti le informazioni di cui hai bisogno per effettuare il check-in e sentirti a casa.</p>
                                    </div>
                                </div>

                                <div class="faq-row">
                                    <div class="faq-question">
                                        <h4>Quali informazioni devo fornire quando prenoto?</h4>
                                    </div>
                                    <div class="faq-dot fb-bg"></div>
                                    <div class="faq-content">
                                        <p>Prima di prenotare su BoolBnb, chiediamo a tutti gli utenti di fornire alcune informazioni, come nome e cognome, indirizzo email, numero di telefono e dettagli di pagamento. </p>
                                    </div>
                                </div>

                                <div class="faq-row">
                                    <div class="faq-question">
                                        <h4>Come posso pagare una prenotazione?</h4>
                                    </div>
                                    <div class="faq-dot fb-bg"></div>
                                    <div class="faq-content">
                                        <p>Non pagare mai al di fuori di BoolBnb. Prenota e paga sempre le tue prenotazioni tramite BoolBnb. In questo modo sarai protetto dai Termini del servizio sui pagamenti. </p>
                                    </div>
                                </div>

                                <div class="faq-row">
                                    <div class="faq-question">
                                        <h4>Assistenza E se dovessi cancellare?</h4>
                                    </div>
                                    <div class="faq-dot fb-bg"></div>
                                    <div class="faq-content">
                                        <p>Se dovessi cancellare una prenotazione a causa di circostanze inaspettate al di fuori dal tuo controllo, potremmo essere in grado di rimborsarti o annullare eventuali penalità. </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
        
        
    </div>
</section>

@endsection
