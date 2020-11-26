@extends('layouts.main')

@section('title')
    BoolBnB
@endsection

@section('mainContent')
<<<<<<< Updated upstream
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
=======
    <body>
        <div class="card-group">
            @foreach ($properties as $property)
                <div class="card">
                    <img class="card-img-top" src="{{$property->flat_image}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$property->title}}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
>>>>>>> Stashed changes
@endsection
