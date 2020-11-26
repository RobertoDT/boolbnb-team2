@extends('layouts.main')

@section('title')
    Details
@endsection

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
                {{-- <h4>{{$property->address}}</h4> --}}
            </div>      
        </div>

        <div class="map-container">
            <img src="{{asset('img/maps.png')}}" alt="maps">
            <p>Address</p>
        </div>

        <div class="form-container">
            <form action="action_page.php">
                <label for="fname">Nome</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">

                <label for="lname">Cognome</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                <label for="email">Email</label>
                <input type="text" id="lemail" name="lemail" placeholder="Your email adress..">   

                <label for="subject">Messaggio</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea> 

                <input type="submit" value="Submit">
            </form>
        </div>

    </div>
</section>
@endsection


