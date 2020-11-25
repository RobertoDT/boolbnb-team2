@extends('layouts.main')

@section('title')
    Details
@endsection

@section('mainContent')
<section class="detail">
    <div>
        <div class="img-responsive">  
            <img src="{{$property->flat_image}}" alt="">
        </div>  
        <h1>{{$property->title}}</h1>
        <p>{{$property->description}}</p>  
        <div class="service_description">
            <h4>{{$property->rooms_number}}</h4>
            <h4>{{$property->beds_number}}</h4>
            <h4>{{$property->bathrooms_number}}</h4>
            <h4>{{$property->square_meters}}</h4>
            {{-- <h4>{{$property->address}}</h4> --}}
            <h4>{{$property->square_meters}}</h4>
            
        </div>      
    </div>

</section>
@endsection

