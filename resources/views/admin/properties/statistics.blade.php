@extends("layouts.main")

@include('layouts.header-general')

@section("mainContent")

<div class="container">

  <h1>Visualizzazioni della proprietà: "{{$property->title}}"<span><img class="statistic_image" src="{{asset("storage/".$property->flat_image)}}" alt=""></span></h1>

  <h3>Seleziona un mese dell'anno:</h3>
  <div class="month_calendar">
    <input id="bday-month" type="month" name="bday-month" value="">
  </div>
  <input id="property_id_stat" type="hidden" name="" value="{{$property->id}}">
  <div class="messaggio_no_ris premium_name">
    <h2 class="no_results_message"></h2>
  </div>
  <canvas id="myChart"></canvas>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>

@endsection
