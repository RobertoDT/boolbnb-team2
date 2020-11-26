<!-- pagina principale -->
@extends('layouts.main')

@section('mainContent')


<div class="container">
    <div class="row">
        <div class="container">
            @if (session()->has('success'))
            <div class="alert alert-success">
                @if(is_array(session('success')))
                    <ul>
                        @foreach (session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ session('success') }}
            @endif
        </div>
        @endif
            <h1>I miei appartamenti</h1>
            {{-- <ul class="flat_list">
                @foreach ($properties as $property)
                    <li class="all_properties">
                        <div class="img-responsive">
                            <img class="transition" src="{{$property->flat_image}}" alt="Home Picture">
                        </div>
                        <div class="overlay">
                        <div class="small-container">
                        <a href="admin/properties/{{$property->id}}">{{$property->title}}</a>
                        </div>
                        </div>
                    </li>
                @endforeach     
            </ul> --}}
        @foreach ($properties as $property)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('storage/'.$property->flat_image)}}" alt="House Image">
            <div class="card-body">
                <h5 class="card-title">{{$property->title}}</h5>
                {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
            </div>
            {{-- <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul> --}}
            <div class="card-body">
                <a href="{{route('admin.properties.show', $property)}}" class="card-link">Show details</a>
                <a href="{{route('admin.properties.edit', $property)}}" class="card-link">Edit infos</a>
                <!-- form di eliminazione proprietà -->
                <form class="" action="{{route("admin.properties.destroy", $property)}}" method="POST">
                    @csrf
                    @method("DELETE")

                    <button type="submit" class="btn btn-danger">ELIMINA PROPRIETA'</button>
                </form>
                <!-- /form di eliminazione proprietà -->

                 </div>
            </div>
            @endforeach
    </div>
</div>

@endsection