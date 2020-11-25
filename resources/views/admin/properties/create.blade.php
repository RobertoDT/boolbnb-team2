<!-- form di creazione nuova proprietà -->
@extends("layouts.main")

@section("mainContent")
<div class="container">
  <h1>Crea un nuovo annuncio</h1>
  <!-- form di creazione -->
  <form action="{{route("admin.properties.store")}}" method="POST" enctype="multipart/form-data">
    <!-- token -->
    @csrf
    <!-- metodo -->
    @method("POST")

    <!-- titolo -->
    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" maxlength="255" placeholder="Inserisci il titolo riepilogativo" value="{{old("title")}}">
    </div>
    <!-- /titolo -->

    <!-- descrizione -->
    <div class="form-group">
      <label for="description">Descrizione</label>
      <input type="text" class="form-control" id="description" name="description" maxlength="400" placeholder="Inserisci la descrizione" value="{{old("description")}}">
    </div>
    <!-- /descrizione -->

    <!-- rooms_number -->
    <div class="form-group">
      <label for="rooms_number">Numero di stanze</label>
      <input type="number" class="form-control" id="rooms_number" name="rooms_number" placeholder="Inserisci il numero di stanze" value="{{old("rooms_number")}}">
    </div>
    <!-- /rooms_number -->

    <!-- beds_number -->
    <div class="form-group">
      <label for="beds_number">Numero di letti</label>
      <input type="number" class="form-control" id="beds_number" name="beds_number" placeholder="Inserisci il numero di letti" value="{{old("beds_number")}}">
    </div>
    <!-- /beds_number -->

    <!-- bathrooms_number -->
    <div class="form-group">
      <label for="bathrooms_number">Numero di bagni</label>
      <input type="number" class="form-control" id="bathrooms_number" name="bathrooms_number" placeholder="Inserisci il numero di bagni" value="{{old("bathrooms_number")}}">
    </div>
    <!-- /bathrooms_number -->

    <!-- immagine -->
    <div class="form-group">
      <label for="flat_image">Immagine</label>
      <input type="file" class="form-control" id="flat_image" name="flat_image" placeholder="Inserisci l'immagine" accept="image/*">
    </div>
    <!-- /immagine -->

    <!-- square_meters -->
    <div class="form-group">
      <label for="square_meters">Metri quadri</label>
      <input type="number" class="form-control" id="square_meters" name="square_meters" placeholder="Inserisci i metri quadri" value="{{old("square_meters")}}">
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

    <!-- active -->
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="active" name="active" value="1">
      <label class="form-check-label" for="active">Rendi subito visibile il mio appartamento</label>
    </div>
    <!-- /active -->

    <!-- bottone per il submit -->
    <button type="submit" class="btn btn-primary">CREA</button>
    <!-- /bottone per il submit -->

  </form>
  <!-- /form di creazione -->

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
