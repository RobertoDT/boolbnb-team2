@extends('layouts.main')

@section('title')
    BoolBnB
@endsection

@include('layouts.header-index')

@section('mainContent')
<div class="hero">
    <p>Home away from Home</p>
</div>
<section class="home_guest">
    <div class="container">
        <h1 class="premium_name">In Evidenza</h1>
            <ul class="flat_list">
                <?php $count = 0; ?>
                @foreach ($sponsored_properties as $sponsored_property)
                    <?php if($count == 12) break; ?>
                        <li class="all_properties">
                            <div class="img-responsive">
                                <img class="transition" src="{{$sponsored_property->flat_image}}" alt="Home Picture">
                            </div>
                            <div class="overlay">
                                <div class="small-container">
                                    <a href="/properties/{{$sponsored_property->id}}">{{$sponsored_property->title}}</a>
                                    <p class="evidence">Promosso</p>
                                </div>
                            </div>
                        </li>
                    <?php $count++; ?>
                @endforeach  
                @php
                $i = 12 - $count;
                @endphp
            </ul>
            <h2 class="premium_name">Scelti per voi</h2>
                <ul class="flat_list">
                    <?php $count_not_sponsored = 0; ?>
                    @foreach ($not_sponsored_properties as $not_sponsored_property)
                        <?php if($count_not_sponsored == $i) break; ?>
                            <li class="all_properties">
                                <div class="img-responsive">
                                    <img class="transition" src="{{$not_sponsored_property->flat_image}}" alt="Home Picture">
                                </div>
                                <div class="overlay">
                                <div class="small-container">
                                    <a href="/properties/{{$not_sponsored_property->id}}">{{$not_sponsored_property->title}}</a>
                                </div>
                                </div>
                            </li>
                            <?php $count_not_sponsored++; ?>
                    @endforeach     
                </ul>
            
    </div>
</section>
@endsection
