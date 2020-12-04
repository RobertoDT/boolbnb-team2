<!-- pagina principale -->
@extends('layouts.main')

@include('layouts.header-general')

@section('mainContent')
<div class="container">

    <div class="container">
        <div class="row p_t_b_50">
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

            <div class="bottoni-admin">
            <!-- bottone per creare annuncio appartamento -->
                <a class="btn modifing_link" id="admin-btn" href="{{route("admin.properties.create")}}">Aggiungi appartamento</a>
            <!-- /bottone per creare annuncio appartamento -->

            <!-- bottone per messaggi -->
            <a href="{{route("admin.messages")}}" class="btn modifing_link admin-btn">Visualizza i tuoi messaggi</a>
            <!-- /bottone per messaggi -->
            </div>

            <h1>I miei appartamenti</h1>
            <ul class="flat_list">
                {{-- Stampa della lista degli appartamenti --}}
            @foreach ($properties as $property)
            <li class="card-list">
            <div class="card-box">
                <img class="card-img-top" src="{{asset('storage/'.$property->flat_image)}}" alt="House Image">
                <div>
                    <h5 class="card-title text_center">{{$property->title}}</h5>
                </div>
                <div class="text_center">
                    <a class="btn modifing_link" href="{{route('admin.properties.show', $property)}}" class="card-link">Mostra dettagli</a>
                    <a class="btn modifing_link" href="{{route('admin.properties.edit', $property)}}" class="card-link">Modifica informazioni</a>

                    <!-- form di eliminazione proprietà -->
                    <form class="" action="{{route("admin.properties.destroy", $property)}}" method="POST">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn modifing_link">Cancella appartamento</button>
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
<div>

@endsection
