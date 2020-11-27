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

         <!-- bottone per creare annuncio appartamento -->
            <a class="btn modifing_link" href="{{route("admin.properties.create")}}">Crea annuncio</a>
        <!-- /bottone per creare annuncio appartamento -->

        <h1>I miei appartamenti</h1>
        <ul class="flat_list">
            {{-- Stampa della lista degli appartamenti --}}
        @foreach ($properties as $property)
        <li>
        <div class="card">
            <img class="card-img-top" src="{{asset('storage/'.$property->flat_image)}}" alt="House Image">
            <div class="card-body">
                <h5 class="card-title text_center">{{$property->title}}</h5>
            </div>
            <div class="card-body text_center">
                <a class="btn modifing_link" href="{{route('admin.properties.show', $property)}}" class="card-link">Mostra dettagli</a>
                <a class="btn modifing_link" href="{{route('admin.properties.edit', $property)}}" class="card-link">Modifica informazioni</a>
                
                <!-- form di eliminazione proprietà -->
                <form class="" action="{{route("admin.properties.destroy", $property)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    
                    <button type="submit" class="btn modifing_link">Delete House</button>
                </form>
                <!-- /form di eliminazione proprietà -->

                {{-- Stampa della lista degli appartamenti --}}

                 </div>
            </div>
            </li>
            @endforeach
         </div>
        </ul>
</div>

@endsection