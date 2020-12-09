@extends('layouts.search_main')

@section('title')
    BoolBnB
@endsection

@section('mainContent')

<div class="container search_container">
  <div class="row">
    <div class="col sponsored_list">
      <h2 class="premium_name name_search">In evidenza</h1>
      <div class="card-deck row properties_list sponsored list-highlight align-items-stretch">

      </div>
    </div>
  </div>
</div>
<div class="container search_container">
  <div class="row">
    <div class="col not_sponsored_list">
      <h2 class="premium_name name_search">Scelti per voi</h1>
      <div class="card-deck row properties_list not_sponsored align-items-stretch">

      </div>
    </div>
  </div>
</div>

  <script id="property-template" type="text/x-handlebars-template">
    <div class="col-md-4 col-sm-6 col-xs-12 d-flex align-self-stretch margin_auto"  data-id="@{{id}}">
      <a href="/properties/@{{id}}" class="margin_auto">
      <div class="profile-card-4 text-center">
        <h4 class="text-center min_height_70 padding_title"><strong>@{{title}}</strong></h4>
        
      
        <img src="@{{flat_image}}" class="img img-responsive card-img-top" alt="Immagine appartamento">
          <div class="profile-content">
              <div class="profile-name">
                {{-- <h4 class="text-center"><strong>@{{title}}</strong></h4> --}}
                  <p>@{{metropolis}}</p>
                  {{-- <p>@{{street}}</p> --}}
              </div>
              <div class="profile-description card-text">
                <p>@{{description}}</p>
              </div>
              <div class="row">
                  <div class="col-4" data-toggle="tooltip" data-placement="top" title="Stanze">
                      <div class="profile_overview">
                          <h4><i class="fas fa-door-open"></i></h4>
                          <h4>@{{rooms_number}}</h4>
                      </div>
                  </div>
                  <div class="col-4" data-toggle="tooltip" data-placement="top" title="Letti">
                      <div class="profile_overview">
                          <h4><i class="fas fa-bed"></i></h4>
                          <h4>@{{beds_number}}</h4>
                      </div>
                  </div>
                  <div class="col-4" data-toggle="tooltip" data-placement="top" title="Bagni">
                      <div class="profile_overview">
                        <h4><i class="fas fa-bath"></i></h4>
                        <h4>@{{bathrooms_number}}</h4>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </a>
  </div>
  </script>

  <script id="no_results" type="text/x-handlebars-template">
    <div class="not_found">
      <h4>La tua ricerca non ha prodotto alcun risultato</h4>
    </div>
  </script>

  {{-- <div class="col-4" data-id="@{{id}}">
    <div class="card card-products mb-5" style="width: 18rem;">
        <img src="@{{flat_image}}" class="card-img-top" alt="Immagine appartamento">
        <div class="card-body">
            <h5 class="card-title">@{{title}}</h5>
            <p class="card-text">@{{description}}</p>
        </div>
        <div class="card-footer">
            <a href="/properties/@{{id}}" class="btn btn-primary">DETTAGLI</a>
        </div>
    </div>
</div> --}}
@endsection
