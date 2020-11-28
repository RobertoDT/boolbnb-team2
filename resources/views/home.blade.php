@extends('layouts.main')

@include('layouts.header-general')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p_t_b_50">
            <div class="card text-center">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="links">
                    <a class="btn modifing_link" href="{{route('admin.properties.index')}}" class="card-link">Visualizza i tuoi appartamenti</a> <br>
                    <a class="btn modifing_link" href="{{route('properties.index')}}" class="card-link">Torna alla home page</a><br>
                    <a class="btn modifing_link" href="" class="card-link">Visualizza messaggi</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
