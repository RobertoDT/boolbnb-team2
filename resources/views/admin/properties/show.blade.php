@extends('layouts.main')

@section('title', 'BoolBnB')

@section('header')
    @include('layouts.header-general')
@endsection

@section('mainContent')
<section class="detail">

    <div class="background-wrapper">

        <div class="wrap">

            @if(session('success_message'))
              <div class="alert alert-success">
                {{session('success_message')}}
              </div>
            @endif

            {{-- NAVBAR --}}
            <div class="menu-admin">
                <ul>
                    <li><a href="{{route('admin.properties.edit', $property)}}"><i class="fas fa-pencil-alt"></i> <span>Modifica</span></a></li>
                    <li>
                        <form class="" action="{{route("admin.properties.destroy", $property)}}" method="POST">
                            @csrf
                            @method("DELETE")
                           <a href=""><i class="fas fa-trash-alt"></i> <span>Elimina</span></a>
                        </form>
                    </li>
                    <li><a href="{{route("admin.sponsors.create")}}"><i class="fas fa-dollar-sign"></i> <span>Sponsorizza</span></a></li>
                    <li><a href="{{route("admin.statistics", $property->id)}}"><i class="fas fa-chart-bar"></i> <span>Statistiche</span></a></li>
                    <li><a href="{{route("admin.properties.index")}}"><i class="fas fa-user"></i> <span>I miei appartamenti</span></a></li>
                </ul>
            </div>
            {{-- //NAVBAR --}}

            {{-- MAIN --}}
            <div class="main-layout">

                {{-- DESCRIZIONE --}}
                <div class="sezione side">
                    <div class="desc">
                        <h5>La tua descrizione: </h5>
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
                        <h5>Le tue Caratteristiche</h5>
                        <h6><i class="fas fa-home"></i> Locali: {{$property->rooms_number}}</h6>
                        <h6><i class="fas fa-bed"></i> Letti: {{$property->beds_number}}</h6>
                        <h6><i class="fas fa-shower"></i> Bagni: {{$property->bathrooms_number}}</h6>
                        <h6><i class="fas fa-th"></i> Metri Quadri: {{$property->square_meters}}</h6>
                    </div>
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
                    <div class="visibility">
                        <h5>Visibilitá</h5>
                            @if ($property->active == 1)
                                <i class="fas fa-eye"> <span class="vis">Visibile</span></i>
                            @else 
                                <i class="fas fa-eye-slash"> <span class="vis">Non visibile</span></i>
                            @endif
                    </div>
                </div>
                {{-- //EXTRA --}}

            </div>
            {{-- //MAIN --}}
            {{-- INFORMATIONS AND MAP --}}
            <div class="info-mappa">
                {{-- ADDRESS --}}
                <div class="indirizzo">
                    <h5>Il tuo indirizzo: {{$property->street}}, {{$property->metropolis}}</h5>
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


            {{-- SPAZION --}}
            <div class="bnb-host">
                <h1 class="bnb-host-title">Il mio spazio è adatto a BoolBnb?</h1>

                    <div class="flex-quotes">
                        <div class="col col-image img-hidden">
                            &nbsp;
                        </div>
                        <div class="col col-text">
                            <h3>Inizia dalle basi</h3>
                                <p>Di cosa ha bisogno il mio spazio se voglio affittarlo su BoolBnb? Gli ospiti si aspettano come minimo uno spazio per dormire comodo e pulito, e l'accesso a un bagno. Non tutti gli alloggi offrono accesso a una cucina. È importante però, qualora fosse questo il tuo caso, indicare chiaramente nel tuo annuncio se gli ospiti avranno o meno accesso a uno spazio per cucinare.</p>
                        </div>
                    </div>


                    <div class="flex-quotes">
                        <div class="col col-image img-hidden">
                            &nbsp;
                        </div>
                        <div class="col col-text col-left">
                            <h3>Definisci il tipo di alloggio</h3>
                                <p>Gli alloggi BoolBnb spaziano molto in termini di tipologia. È quindi cruciale che il tuo annuncio indichi precisamente che tipo di alloggio stai offrendo. È una casa? Un appartamento? Un bed and breakfast? Un boutique hotel? Alcuni annunci definiscono il relativo alloggio con la dicitura “spazi unici”. Questa categoria include case sugli alberi, iurte, campeggi, barche a vela, mulini a vento, camper, ecc.</p>
                        </div>
                    </div>


                    <div class="flex-quotes">
                        <div class="col col-image img-hidden">
                            &nbsp;
                        </div>
                        <div class="col col-text">
                            <h3>Decidi quali ambienti mettere a disposizione dei tuoi ospiti</h3>
                                <p>Puoi decidere di dare ai tuoi ospiti l'accesso esclusivo all'intera proprietà o a una sola stanza, oppure invitarli a condividere spazi come l'area notte, la cucina o il bagno con la tua famiglia, con i tuoi coinquilini o con altri ospiti. Spetta poi a te decidere se dedicare lo spazio interamente agli ospiti o se continuare a utilizzarlo anche per conservare i tuoi effetti personali. L'importante è tenerlo pulito e che la comunicazione con gli ospiti sia trasparente, affinché sappiano esattamente cosa aspettarsi.</p>
                        </div>
                    </div>

                    <div class="flex-quotes">
                        <div class="col col-image img-hidden">
                            &nbsp;
                        </div>
                        <div class="col col-text col-left">
                            <h3>Parole e immagini</h3>
                                <p>La chiarezza è la chiave di tutto: menzionare in un annuncio la presenza di animali domestici è un ottimo inizio, ma le foto sono un mezzo ancora più efficace, perché gli ospiti potrebbero prenotare senza leggere a fondo l'intera descrizione. Se il tuo alloggio include caratteristiche peculiari (come ad esempio la presenza di un animale domestico), è inoltre buona pratica assicurarti, durante il processo di prenotazione, che gli ospiti abbiano letto attentamente il tuo annuncio.</p>
                        </div>
                    </div>

            </div>
            {{-- //SPAZION --}}


        </div>
        {{-- //wrap --}}

    </div>
    {{-- //background-wrapper --}}

</section>
@endsection
