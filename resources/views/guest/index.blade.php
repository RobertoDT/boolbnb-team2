@extends('layouts.main')

@section('title')
    BoolBnB
@endsection

@include('layouts.header-index')

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
                <?php $count = 0; ?>
                @foreach ($sponsored_properties as $sponsored_property)
                    <?php if($count == 12) break; ?>
                        <li class="all_properties" id="li-highlight">
                            <div class="img-responsive" id="img-highlight">
                                <img class="transition" src="{{$sponsored_property->flat_image}}" alt="Home Picture">
                            </div>
                            <div class="overlay over-highlight">
                                <div class="small-container">
                                    <a href="/properties/{{$sponsored_property->id}}">{{$sponsored_property->title}}</a>
                                    <p class="metro">{{$sponsored_property->metropolis}}</p>
                                    <p class="evidence">Sponsorizzato</p>
                                </div>
                            </div>
                        </li>
                    <?php $count++; ?>
                @endforeach  
                @php
                $i = 12 - $count;
                @endphp
            </ul>
        {{-- /IN EVIDENZA --}}   

        {{-- SCELTI PER VOI --}}
        <h2 class="chosen">Scelti per voi</h2>
            <ul class="flat_list">
                <?php $count_not_sponsored = 0; ?>
                @foreach ($not_sponsored_properties as $not_sponsored_property)
                    <?php if($count_not_sponsored == $i) break; ?>
                        <li class="all_properties">
                            <div class="img-responsive">
                                <img class="transition" src="{{$not_sponsored_property->flat_image}}" alt="Home Picture">
                            </div>
                            <div class="overlay">
                            <div class="small-container">
                                <a href="/properties/{{$not_sponsored_property->id}}">{{$not_sponsored_property->title}}</a>
                                <p class="metro">{{$not_sponsored_property->metropolis}}</p>
                            </div>
                            </div>
                        </li>
                        <?php $count_not_sponsored++; ?>
                @endforeach     
            </ul>
            {{-- //SCELTI PER VOI --}}

            {{-- COME FUNZIONA --}}
            <h1>Come funziona?</h1>
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
            
    </div> 
    {{-- container --}}

</section>
@endsection
