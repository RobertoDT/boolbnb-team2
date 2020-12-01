@extends('layouts.search')

@section('title')
    BoolBnB
@endsection

@section('mainContent')
<div class="container search_container">
  <div class="row">
    <div class="col">
      <h1 class="premium_name">Apartments</h1>
      <div class="card-deck row properties_list">

      </div>

    </div>

  </div>

</div>

  <script id="property-template" type="text/x-handlebars-template">
    <div class="col-4" data-id="@{{id}}">
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
    </div>
  </script>
@endsection
