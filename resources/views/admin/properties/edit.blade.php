<!-- form di modifica di una proprietà -->
@extends("layouts.main")

@section("mainContent")
<div class="container">
  <h1>Modifica il tuo annuncio</h1>
  <!-- form di modifica -->
  <form action="{{route("admin.properties.update", $property)}}" method="POST" enctype="multipart/form-data">
    <!-- token e meotodo -->
    @csrf
    @method("PUT")

    <!-- titolo -->
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" maxlength="255" placeholder="Inserisci il titolo" value="{{old("title") ? old("title") : $property->title}}">
    </div>
    <!-- /titolo -->

    <!-- descrizione -->
    <div class="form-group">
      <label for="description">Descrizione</label>
      <input type="text" class="form-control" id="description" name="description" maxlength="400" placeholder="Inserisci la descrizione" value="{{old("description") ? old("description") : $property->description}}">
    </div>
    <!-- /descrizione -->

    <!-- rooms_number -->
    <div class="form-group">
      <label for="rooms_number">Numero di stanze</label>
      <input type="number" class="form-control" id="rooms_number" name="rooms_number" placeholder="Inserisci il numero di stanze" value="{{old("rooms_number") ? old("rooms_number") : $property->rooms_number}}">
    </div>
    <!-- /rooms_number -->

    <!-- beds_number -->
    <div class="form-group">
      <label for="beds_number">Numero di letti</label>
      <input type="number" class="form-control" id="beds_number" name="beds_number" placeholder="Inserisci il numero di letti" value="{{old("beds_number") ? old("beds_number") : $property->beds_number}}">
    </div>
    <!-- /beds_number -->

    <!-- bathrooms_number -->
    <div class="form-group">
      <label for="bathrooms_number">Numero di bagni</label>
      <input type="number" class="form-control" id="bathrooms_number" name="bathrooms_number" placeholder="Inserisci il numero di bagni" value="{{old("bathrooms_number") ? old("bathrooms_number") : $property->bathrooms_number}}">
    </div>
    <!-- /bathrooms_number -->

    <!-- immagine -->
    <div class="form-group">
      <label for="flat_image">Immagine</label>
      <input type="file" class="form-control" id="flat_image" name="flat_image" placeholder="Inserisci la nuova immagine" accept="image/*">
    </div>
    <!-- /immagine -->

    <!-- square_meters -->
    <div class="form-group">
      <label for="square_meters">Metri quadri</label>
      <input type="number" class="form-control" id="square_meters" name="square_meters" placeholder="Inserisci i metri quadri" value="{{old("square_meters") ? old("square_meters") : $property->square_meters}}">
    </div>
    <!-- /square_meters -->

    <!-- latitude -->
    <div class="form-group">
      <input type="hidden" min="-90" max="90" class="form-control" id="latitude" name="latitude" value="{{old("latitude") ? old("latitude") : $property->latitude}}">
    </div>
    <!-- /latitude -->

    <!-- longitude -->
    <div class="form-group">
      <input type="hidden" min="-180" max="180" class="form-control" id="longitude" name="longitude" value="{{old("longitude") ? old("longitude") : $property->longitude}}">
    </div>
    <!-- /longitude -->

    <!-- lista di servizi extra -->
    <div class="form-check">
      <label class="form-check-label" for="active">Scegli quali servizi extra includere</label>
      <ul>
        <li>
          <span>wi-fi</span>
          <input type="checkbox" name="wi-fi" id="wi-fi" value="1" {{old("wi-fi") == 1 ? "checked" : ""}}>
        </li>
        <li>
          <span>parking</span>
          <input type="checkbox" name="parking" id="parking" value="1" {{old("parking") == 1 ? "checked" : ""}}>
        </li>
        <li>
          <span>pool</span>
          <input type="checkbox" name="pool" id="pool" value="1" {{old("pool") == 1 ? "checked" : ""}}>
        </li>
        <li>
          <span>reception</span>
          <input type="checkbox" name="reception" id="reception" value="1" {{old("reception") == 1 ? "checked" : ""}}>
        </li>
        <li>
          <span>sauna</span>
          <input type="checkbox" name="sauna" id="sauna" value="1" {{old("sauna") == 1 ? "checked" : ""}}>
        </li>
        <li>
          <span>sea view</span>
          <input type="checkbox" name="sea-view" id="sea-view" value="1" {{old("sea-view") == 1 ? "checked" : ""}}>
        </li>
      </ul>
    </div>
    <!-- /lista di servizi extra -->

    <!-- active -->
    <div class="form-check">
      <label class="form-check-label" for="active">Rendi subito visibile il mio appartamento</label>
      @php
        $checked = old("active") !== null ? old("active") : 0;
      @endphp
      <input type="checkbox" name="active" placeholder="active" id="active" value="1" {{$checked == 1 ? "checked" : ""}}>
    </div>
    <!-- /active -->

    <!-- bottone per il submit -->
    <button type="submit" class="btn btn-primary">MODIFICA</button>
    <!-- /bottone per il submit -->

  </form>
  <!-- /form di modifica -->

  <!-- controllo sugli errori -->
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <!-- /controllo sugli errori -->

</div>
@endsection
