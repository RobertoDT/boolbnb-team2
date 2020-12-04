@extends('layouts.main')

@section('title')
    Property Details
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="detail">
    <div class="large-wrapper">
        <div class="wrapper">

            {{-- DETTGLI STRUTTURA --}}
            <div class="property-details">

                {{-- IMMAGINE COPERTINA E TITOLO --}}
                <div class="title-wrapper">
                    <div class="img-container">
                        <img class="img-show" src="{{$property->flat_image}}" alt="Foto appartamento">
                    </div>
                    <h1>{{$property->title}}</h1>

                    <!-- BOTTONE -->
                    <button type="button" class="btn btn-primary modifing_link
                    " data-toggle="modal" data-target="#exampleModal">
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
            {{-- //DETTGLI STRUTTURA --}}

        </div>
    </div>

        <div class="wrapper">
            {{-- MAPPA --}}
            <script src="https://cdn.jsdelivr.net/npm/places.js@1.19.0"></script>
    
            <div id="map-example-container-paris"></div>
            <input type="hidden" id="input-map-paris" class="form-control" placeholder="Find a street in Paris, France. Try &quot;Rivoli&quot;" />
        
            {{-- prendiamo coordinate da $property --}}
            <input type="hidden" id="latitude" value="{{$property->latitude}}">
            <input type="hidden" id="longitude" value="{{$property->longitude}}">
                {{-- MAPPA --}}
            </div>
            {{-- MAPPA --}}
        </div>


</section>
@endsection
