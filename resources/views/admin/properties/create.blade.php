<!-- form di creazione nuova proprietà -->
@extends("layouts.main")

@section('title', 'BoolBnB')

@section('header')
    @include('layouts.header-general')
@endsection

@section("mainContent")
<div class="container">
  <h1>Crea un nuovo annuncio</h1>
  <!-- form di creazione -->
  <form action="{{route("admin.properties.store")}}" class="p_bottom_50 form_create" method="POST" enctype="multipart/form-data">
    <!-- token -->
    @csrf
    <!-- metodo -->
    @method("POST")

    <!-- titolo -->
    <div class="form-group create_form_group">
      <label for="title">Titolo dell'abitazione</label>
      <input type="text" class="form-control create_form_control @error('title') is-invalid @enderror" id="title" name="title" maxlength="255" placeholder="Inserisci il titolo della tua abitazione" value="{{old("title")}}">
      @error('title')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /titolo -->

    <!-- street -->
    <div class="form-group create_form_group">
      <label for="street">Indirizzo</label>
      <input type="search" class="form-control create_form_control @error('street') is-invalid @enderror" id="form-address" name="street" placeholder="Inserisci il tuo indirizzo" value="{{old("street")}}">
      @error('street')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /street -->

    <!-- metropolis -->
    <div class="form-group create_form_group">
      <label for="metropolis">Città</label>
      <input type="text" class="form-control create_form_control @error('metropolis') is-invalid @enderror" id="form-city" name="metropolis" placeholder="Inserisci la Città" value="{{old("metropolis")}}">
      @error('metropolis')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /metropolis -->

    <!-- country -->
    <div class="form-group create_form_group">
      <label for="country">Nazione</label>
      <input type="text" class="form-control create_form_control @error('country') is-invalid @enderror" id="form-country" name="country" placeholder="Inserisci la Nazione" value="{{old("country")}}">
      @error('country')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /country -->

    <!-- postal-code -->
    <div class="form-group create_form_group">
      <label for="zip_code">Codice Postale</label>
      <input type="text" class="form-control create_form_control @error('zip_code') is-invalid @enderror" id="form-zip" name="zip_code" placeholder="Inserisci il CAP della Città" maxlength="10" value="{{old("zip_code")}}">
      @error('zip_code')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /postal-code -->

    <!-- descrizione -->
    <div class="form-group create_form_group">
      <label for="description">Descrizione</label>
      <input type="text" class="form-control create_form_control @error('description') is-invalid @enderror" id="description" name="description" maxlength="400" placeholder="Inserisci i dettagli" value="{{old("description")}}">
      @error('description')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /descrizione -->

    <!-- rooms_number -->
    <div class="form-group create_form_group">
      <label for="rooms_number">Numero di stanze</label>
      <input type="number" class="form-control create_form_control width_30 @error('rooms_number') is-invalid @enderror" id="rooms_number" name="rooms_number" placeholder="Numero di stanze" value="{{old("rooms_number")}}">
      @error('rooms_number')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /rooms_number -->

    <!-- beds_number -->
    <div class="form-group create_form_group">
      <label for="beds_number">Numero di letti</label>
      <input type="number" class="form-control create_form_control width_30 @error('beds_number') is-invalid @enderror" id="beds_number" name="beds_number" placeholder="Numero di letti" value="{{old("beds_number")}}">
      @error('beds_number')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /beds_number -->

    <!-- bathrooms_number -->
    <div class="form-group create_form_group">
      <label for="bathrooms_number">Numero di bagni</label>
      <input type="number" class="form-control create_form_control width_30 @error('bathrooms_number') is-invalid @enderror" id="bathrooms_number" name="bathrooms_number" placeholder="Numero di bagni" value="{{old("bathrooms_number")}}">
      @error('bathrooms_number')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /bathrooms_number -->

    <!-- square_meters -->
    <div class="form-group create_form_group square_meters_mod">
      <label for="square_meters">Metri quadri</label>
      <input type="number" class="form-control create_form_control width_30 @error('square_meters') is-invalid @enderror" id="square_meters" name="square_meters" placeholder="Inserisci i metri quadri" value="{{old("square_meters")}}">
      @error('square_meters')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /square_meters -->

    <!-- latitude -->
    <div class="form-group">
      <input type="hidden" min="-90" max="90" class="form-control" id="form-lat" name="latitude" value="{{old("latitude")}}" placeholder="latitude">
    </div>
    <!-- /latitude -->

    <!-- longitude -->
    <div class="form-group">
      <input type="hidden" min="-180" max="180" class="form-control" id="form-lon" name="longitude" value="{{old("longitude")}}" placeholder="longitudine">
    </div>
    <!-- /longitude -->

    <!-- immagine -->
    <div class="form-group create_form_group">
      <label for="flat_image">Immagine</label>
      <input type="file" class="form-control create_form_control img_form width_30 @error('flat_image') is-invalid @enderror" id="flat_image" name="flat_image" placeholder="Insert the image" accept="image/*">
      @error('flat_image')
        <div class="alert alert-danger create_alert_danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /immagine -->

    <!-- lista di servizi extra -->
    <div class="form-group width_40">
      <h3>Servizi extra disponibili</h3>
      <ul>
        @foreach($extras as $extra)
        @php
          $extra_id = $extra->id;
        @endphp
        <li>
          <label for="{{$extra->id}}"> {{$extra->name}}</label>
          <input type="checkbox" name="extras[]" id="{{$extra->id}}" value="{{$extra->id}}" {{ (is_array(old('extras')) and in_array($extra_id, old('extras'))) ? ' checked' : '' }}>
        </li>
        @endforeach
      </ul>
    </div>
    <!-- /lista di servizi extra -->

    <!-- active -->
    <div class="form-group">
      <label class="form-check-label" for="active">Rendi visibile l'appartamento adesso</label>
      <input type="checkbox" name="active" placeholder="active" id="active" value="1" {{old("active") == 1 ? "checked" : ""}}>
    </div>
    <!-- /active -->

    <div class="create_buttons">
      <!-- bottone per il submit -->
      <button type="submit" class="btn modifing_link">Salva</button>
      <!-- /bottone per il submit -->

      <!-- Link per tornare alla index -->
      <a class="btn modifing_link" href="{{route("admin.properties.index")}}">Indietro</a>
      <!-- Link per tornare alla index -->
    </div>

  </form>
  <!-- /form di creazione -->
</div>

@endsection
