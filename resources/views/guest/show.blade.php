@extends('layouts.main')

@section('title')
    Property Details
@endsection

@include('layouts.header-general')

@section('mainContent')
<section class="main-content">
    <div class="wrapper">

        {{-- APARTMENT IMAGE --}}
        <div class="img-container">
            <img class="img-show" src="{{$property->flat_image}}" alt="Foto appartamento">
            <div class="address">
                <p>ROMA</p>
            </div>
        </div>
        {{-- /APARTMENT IMAGE --}}

        <h1>{{$property->title}}</h1>

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
                    <h4>DESCRIPTION</h4>
                    <h6><i class="fas fa-door-open gradient"></i> {{$property->description}}</h6>
                </div>
            {{-- /DESCRIPTION --}}
            {{-- FEATURE-EXTRAS    --}}

                <div class="features-extras">
                    <div class="features">
                        <h4>FEATURES</h4>

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
                            <h4>EXTRAS</h4>
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
<script src="https://cdn.jsdelivr.net/leaflet/1/leaflet.js"></script>
@endsection
