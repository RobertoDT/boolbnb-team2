@extends('layouts.main')

@section('title')
    BoolBnB
@endsection

@section('mainContent')
    <body>
        <div class="card-group">
            {{-- @foreach ($properties as $property)
                <div class="card">
                    <img class="card-img-top" src="{{asset('$property->img')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$propertty->title}}</h5>
                    </div>
                </div>
            @endforeach --}}
        </div>
    </body>
@endsection
