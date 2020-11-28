@extends('layouts.main')

@section('title')
    Property Details
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="detail">
    <div class="wrapper">

        <div class="property-details">
            <div class="img-container">  
                <img class="img-show" src="{{$property->flat_image}}" alt="">
            </div> 
            <h1>{{$property->title}}</h1>
            <p>{{$property->description}}</p>  
            <div class="service_description">
                <h5>Locali: {{$property->rooms_number}}</h5>
                <h5>Letti: {{$property->beds_number}}</h5>
                <h5>Bagni: {{$property->bathrooms_number}}</h5>
                <h5>Metri Quadrati: {{$property->square_meters}}</h5>
        
                <h5>Extra:</h5>
                    @foreach ($property->extras as $extra)
                        <p>{{$extra->name}}</p>
                    @endforeach
               
            </div>      
        </div>

        <div class="map-container">
            <h3>Indirizzo e geolocalizzazione:</h3>
                <img src="{{asset('img/maps.png')}}" alt="maps">
                <p>Viale Italia 78, 78000 Pistoia</p>
                {{-- <h4>{{$property->address}}</h4> --}}
        </div>

        <div class="message-container">
        
            <button onclick="document.getElementById('id01').style.display='block'" class="msg-button">Invia un messaggio al proprietario</button>
          
            <div id="id01" class="w3-modal">
              <div class="w3-modal-content w3-card-4">
                <div class="w3-container w3-teal"> 
                  <span onclick="document.getElementById('id01').style.display='none'" 
                  class="w3-button w3-display-topright">&times;</span>
                </div>

                <div class="form-container">
                    <form action="action_page.php">
                        <label for="fname">Nome</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        
                        <label for="lname">Cognome</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" placeholder="Your email adress..">   
                        {{-- se utente e' loggato email viene gia' inserita --}}
        
                        <label for="subject">Messaggio</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea> 
        
                        <input type="submit" value="Submit">
                    </form>
                </div>

              </div>
            </div>
          </div>
        

    </div>
</section>
@endsection


