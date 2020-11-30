@extends('layouts.main')

@section('title')
    BoolBnB
@endsection

@include('layouts.header-index')

@section('mainContent')
<div class="hero">

</div>

<section class="home_guest">
    <div class="container">
        <h1 class="premium_name">In Evidenza</h1>
            <ul class="flat_list">
                @foreach ($properties->slice(0, 12) as $property)
                    <li class="all_properties">
                        <div class="img-responsive">
                            <img class="transition" src="{{$property->flat_image}}" alt="Home Picture">
                        </div>
                        <div class="overlay">
                        <div class="small-container">
                        <a href="/properties/{{$property->id}}">{{$property->title}}</a>
                        </div>
                        </div>
                    </li>
                @endforeach     
            </ul>
    </div>
</section>
@endsection
