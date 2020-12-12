@extends('layouts.main')

@section('title', 'BoolBnB')

@section('header')
    @include('layouts.header-index')
@endsection

@section('mainContent')

{{-- HERO --}}
<div class="hero">
    <div class="bubble">
        <span class="txt-rotate"
        data-period="2000"
        data-rotate='["Home away from Home" ]'>
        </span>
    </div>
</div>
{{-- //HERO --}}


<section class="home_guest">
    <div class="container">

       {{-- IN EVIDENZA --}}
       <h1 class="highlight">In Evidenza</h1>
       <ul class="flat_list list-highlight">
           @foreach ($sponsored_properties as $sponsored_property)
                <li class="all_properties" id="li-highlight">
                    <div class="img-responsive" id="img-highlight">
                        <img class="transition" src="{{asset('storage/'.$sponsored_property->flat_image)}}" alt="Home Picture">
                    </div>
                    <div class="overlay over-highlight">
                        <div class="small-container">
                            <a href="/properties/{{$sponsored_property->id}}">{{$sponsored_property->title}}</a>
                            <p class="metro">{{$sponsored_property->metropolis}}</p>
                            <p class="evidence">Sponsorizzato</p>
                        </div>
                    </div>
                </li>
           @endforeach  
       </ul>
   {{-- /IN EVIDENZA --}}   

   {{-- SCELTI PER VOI --}}
   <h2 class="chosen">Scelti per voi</h2>
       <ul class="flat_list">
           @foreach ($not_sponsored_properties as $not_sponsored_property)
                <li class="all_properties">
                    <div class="img-responsive">
                        <img class="transition" src="{{asset('storage/'.$not_sponsored_property->flat_image)}}" alt="Home Picture">
                    </div>
                    <div class="overlay">
                    <div class="small-container">
                        <a href="/properties/{{$not_sponsored_property->id}}">{{$not_sponsored_property->title}}</a>
                        <p class="metro">{{$not_sponsored_property->metropolis}}</p>
                    </div>
                    </div>
                </li>
           @endforeach     
       </ul>
       {{-- //SCELTI PER VOI --}}


            {{-- COME FUNZIONA --}}
            <h1 class="gs-title">Come funziona?</h1>
            <div class="getting-started">
                <ul class="gs-list">

                    <li class="gs-container">
                        <div class="gs-image">
                            <img src="{{asset('img/gs1.jpg')}}" alt="getting-started">
                        </div>
                        <div class="gs-text">
                            <h4>Scegli i filtri</h4>
                            <p>Usa i filtri per personalizzare la tua ricerca: imposta una fascia di prezzo oppure seleziona la piscina tra i servizi, per ottenere esattamente quello che desideri.</p>
                        </div>
                    </li>

                    <li class="gs-container">
                        <div class="gs-image">
                            <img src="{{asset('img/gs2.jpg')}}" alt="getting-started">
                        </div>
                        <div class="gs-text">
                            <h4>Approfondisci la tua ricerca</h4>
                            <p>Sfoglia le foto. Quindi, leggi le recensioni degli ospiti passati per farti un'idea dell'alloggio.</p>
                        </div>
                    </li>

                    <li class="gs-container">
                        <div class="gs-image">
                            <img src="{{asset('img/gs3.jpg')}}" alt="getting-started">
                        </div>
                        <div class="gs-text">
                            <h4>Prenota in tutta tranquillità</h4>
                            <p>Teniamo le tue informazioni al sicuro e seguiamo gli standard di sicurezza globali per elaborare i tuoi pagamenti.</p>
                        </div>
                    </li>

                    <li class="gs-container">
                        <div class="gs-image">
                            <img src="{{asset('img/gs4.jpg')}}" alt="getting-started">
                        </div>
                        <div class="gs-text">
                            <h4>Arriva e divertiti!</h4>
                            <p>Se hai dei dubbi, basta un clic e il tuo host sarà lieto di risponderti, offrendoti magari anche consigli e suggerimenti sulle attrazioni locali.</p>
                        </div>
                    </li>
                </ul>
            </div>
            {{-- //COME FUNZIONA --}}

            {{-- CERCA --}}
            <div class="find">
                <div class="find-border">
                <h2>Trova l'alloggio giusto per te!</h2>
                    <div class="find-btn-container">                 
                            <button id="find-btn" class="btn btn-dark my-2 my-sm-0 modifing_link search_write search_button">Cerca</button>
                    </div>
                </div>
            </div>
            {{-- //CERCA --}}


            {{-- HOST --}}
            <div class="bnb-host">
                <h1 class="bnb-host-title">Le basi dell'ospitalità su BoolBnb</h1>

                    <div class="flex-quotes">
                        <div class="col col-image" style="background-image: url('/img/host1.jpeg');">
                            &nbsp;
                        </div>
                        <div class="col col-text">
                            <h3>Puoi diventare host</h3>
                                <p>Cosa ci vuole per diventare host di BoolBnb? Innanzitutto, devi avere uno spazio disponibile da condividere con i viaggiatori. Che si tratti di una casa intera, di una stanza in più o di un comodo divano letto, è probabile che ci sia un ospite che sarà felice di soggiornare nel tuo spazio: la chiave è creare un annuncio BoolBnb trasparente e accurato che aiuti i viaggiatori a comprendere esattamente cosa aspettarsi.</p>
                        </div>
                    </div>


                    <div class="flex-quotes">
                        <div class="col col-image" style="background-image: url('/img/host2.jpg');">
                            &nbsp;
                        </div>
                        <div class="col col-text col-left">
                            <h3>Sei tu a decidere il prezzo</h3>
                                <p>Ospitando su BoolBnb, puoi proporre la tua casa ai viaggiatori, senza spese di registrazione o costi di iscrizione. E sei tu a decidere la tua tariffa giornaliera. Puoi impostare prezzi personalizzati per le diverse stagioni, per i weekend e per notti specifiche per le quali desideri offrire una tariffa diversa. Puoi inoltre includere anticipatamente dei costi extra per servizi aggiuntivi come ospiti in più o pulizie. Se hai bisogno di aiuto per determinare la tua tariffa, BoolBnb ti offre degli strumenti in grado di confrontare prezzi e domanda, e di suggerirti quindi un prezzo adeguato per ciascuna notte.</p>
                        </div>
                    </div>


                    <div class="flex-quotes">
                        <div class="col col-image" style="background-image: url('/img/host3.jpeg');">
                            &nbsp;
                        </div>
                        <div class="col col-text">
                            <h3>Inizia a ricevere prenotazioni</h3>
                                <p>Una volta che avrai pubblicato il tuo annuncio su BoolBnb, inizierai a ricevere richieste e prenotazioni da parte degli ospiti. BoolBnb effettua l'addebito per tutti gli ospiti prima dell'arrivo per assicurarsi che tu venga pagato sempre tempestivamente per la tua accoglienza. Non dovrai mai gestire direttamente il denaro.</p>
                        </div>
                    </div>

            </div>
            {{-- //HOST --}}
            
    </div> 
    {{-- container --}}

</section>
@endsection
