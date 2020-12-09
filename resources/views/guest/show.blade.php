@extends('layouts.main')

@section('title')
    Property Details
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="main-content">
    <div class="wrapper">

            {{-- APARTMENT IMAGE --}}
            <h1>{{$property->title}}</h1>
            <div class="img-container">
                <img id="jumbo" class="img-show" src="{{$property->flat_image}}" alt="Foto appartamento">
                    <span><p id="roma">Roma</p></span>
            </div>
            {{-- /APARTMENT IMAGE --}}

            <div class="send-message">
                <h3>Manda un messaggio per maggiori </h3><i class="fas fa-arrow-right fa-2x"></i><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="far fa-envelope fa-2x"></i></button>
            </div>
           

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
                        <h6><i class="fas fa-door-open gradient"></i> {{$property->description}}</h6>
                    </div>
                {{-- /DESCRIPTION --}}

                {{-- FEATURE-EXTRAS    --}}
                    <div class="features-extras">
                        <div class="features">
                            <h4>CARATTERISTICHE</h4>

                            {{-- FEATURES --}}
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
                        {{-- /FEATURE-EXTRAS --}}
                    </div>
                </div>

            </div>     
        {{-- /INFORMATIONS AND MAP --}}   
                
        
    </div>
</section>
@endsection
