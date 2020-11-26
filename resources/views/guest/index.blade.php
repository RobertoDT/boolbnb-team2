@extends('layouts.main')

@section('title')
    BoolBnB
@endsection

@section('mainContent')
<section class="home_guest">
    <div class="container">
            <h1 class="premium_name">In Evidenza</h1>
            <ul class="flat_list">
                @foreach ($properties as $property)
                    <li class="all_properties">
                        <div class="img-responsive">
                            <img src="{{$property->flat_image}}" alt="Home Picture">
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
