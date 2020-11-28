@extends('layouts.main')


@section('title')
    Property Details Edit
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="detail">

    <div class="wrapper">

        <div class="property-details">
            <h1>Il tuo appartamento "{{$property->title}}"</h1>
            <h5>Descrizione:</h5>
                <p>{{$property->description}}</p>
            <h5>Locali:</h5>
                <p>{{$property->rooms_number}}</p>
            <h5>Letti:</h5>
                <p>{{$property->beds_number}}</p>
            <h5>Bagni:</h5>
                <p>{{$property->bathrooms_number}}</p>
            <h5>Metri Quadrati:</h5>
                <p>{{$property->square_meters}}</p>

                <div class="img-container">  
                    <h2>Immagine di copertina:</h2>
                        <img class="img-show" src="{{$property->flat_image}}" alt="">
                </div> 
                {{-- <h4>{{$property->address}}</h4> --}}
            </div>      
        </div>

        <div class="map-border">
            <h2>Indirizzo e geolocalizzazione:</h2>
                <h5>Viale Italia 78, 78000 Pistoia</h5>
                <img src="{{asset('img/maps.png')}}" alt="maps">
        </div>
    </div>

    <div class="buttons">
        <button class="edit">Modifica Appartemento</button>
        <button class="edit">Elimina Appartemento</button>
    </div>

    <div class="sponsor">
        <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Sponsorizza il tuo Appartemento</button>
      
        <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-teal"> 
              <span onclick="document.getElementById('id01').style.display='none'" 
              class="w3-button w3-display-topright">&times;</span>
              <h2>Scegli il tipo di sponsorizzazione</h2>
            </header>
            <div class="w3-container">
              <p>Gold</p>
              <p>Silver</p>
              <p>Platinum</p>
            </div>
            <footer class="w3-container w3-teal">
              <p>Inserisci i dati per il pagamento</p>
            </footer>
          </div>
        </div>
      </div>


      {{-- <!-- bottone per tornare alla index dell'admin -->
  <a href="{{route("admin.properties.index")}}">
    <button type="button" class="btn btn-primary">VISUALIZZA LE PROPRIETA'</button>
  </a>
  <!-- /bottone per tornare alla index dell'admin -->

  <!-- form di eliminazione proprietà -->
  <form class="" action="{{route("admin.properties.destroy", $property)}}" method="POST">
    @csrf
    @method("DELETE")

    <button type="submit" class="btn btn-danger">ELIMINA PROPRIETA'</button>
  </form>
  <!-- /form di eliminazione proprietà --> --}}
    
</section>
@endsection


