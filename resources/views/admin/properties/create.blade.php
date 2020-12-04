<!-- form di creazione nuova proprietà -->
@extends("layouts.main")

@include('layouts.header-general')

@section("mainContent")
<div class="container">
  <h1 class="premium_name">Crea un nuovo annuncio</h1>
  <!-- form di creazione -->
  <form action="{{route("admin.properties.store")}}" class="p_bottom_50" method="POST" enctype="multipart/form-data">
    <!-- token -->
    @csrf
    <!-- metodo -->
    @method("POST")

    <!-- titolo -->
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" maxlength="255" placeholder="Inserisci il titolo riepilogativo" value="{{old("title")}}">
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /titolo -->

    <!-- descrizione -->
    <div class="form-group">
      <label for="description">Descrizione</label>
      <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" maxlength="400" placeholder="Inserisci la descrizione" value="{{old("description")}}">
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /descrizione -->

    <!-- rooms_number -->
    <div class="form-group">
      <label for="rooms_number">Numero di stanze</label>
      <input type="number" class="form-control width_30 @error('rooms_number') is-invalid @enderror" id="rooms_number" name="rooms_number" placeholder="Inserisci il numero di stanze" value="{{old("rooms_number")}}">
      @error('rooms_number')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /rooms_number -->

    <!-- beds_number -->
    <div class="form-group">
      <label for="beds_number">Numero di letti</label>
      <input type="number" class="form-control width_30 @error('beds_number') is-invalid @enderror" id="beds_number" name="beds_number" placeholder="Inserisci il numero di letti" value="{{old("beds_number")}}">
      @error('beds_number')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /beds_number -->

    <!-- bathrooms_number -->
    <div class="form-group">
      <label for="bathrooms_number">Numero di bagni</label>
      <input type="number" class="form-control width_30 @error('bathrooms_number') is-invalid @enderror" id="bathrooms_number" name="bathrooms_number" placeholder="Inserisci il numero di bagni" value="{{old("bathrooms_number")}}">
      @error('bathrooms_number')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /bathrooms_number -->

    <!-- immagine -->
    <div class="form-group">
      <label for="flat_image">Immagine</label>
      <input type="file" class="form-control img_form width_30 @error('flat_image') is-invalid @enderror" id="flat_image" name="flat_image" placeholder="Inserisci l'immagine" accept="image/*">
      @error('flat_image')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /immagine -->

    <!-- square_meters -->
    <div class="form-group">
      <label for="square_meters">Metri quadri</label>
      <input type="number" class="form-control width_30 @error('square_meters') is-invalid @enderror" id="square_meters" name="square_meters" placeholder="Inserisci i metri quadri" value="{{old("square_meters")}}">
      @error('square_meters')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <!-- /square_meters -->

    <!-- latitude -->
    <div class="form-group">
      <input type="hidden" min="-90" max="90" class="form-control" id="latitude" name="latitude" value="57">
    </div>
    <!-- /latitude -->

    <!-- longitude -->
    <div class="form-group">
      <input type="hidden" min="-180" max="180" class="form-control" id="longitude" name="longitude" value="145">
    </div>
    <!-- /longitude -->

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

    <!-- bottone per il submit -->
    <button type="submit" class="btn modifing_link">Salva</button>
    <!-- /bottone per il submit -->

    <!-- Link per tornare alla index -->
    <a class="btn modifing_link" href="{{route("admin.properties.index")}}">Indietro</a>
    <!-- Link per tornare alla index -->

  </form>
  <!-- /form di creazione -->

</div>
@endsection
