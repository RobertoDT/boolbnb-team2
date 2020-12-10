@extends("layouts.main")

@include('layouts.header-general')

@section("mainContent")

<div class="container">

  <input id="bday-month" type="month" name="bday-month" value="">
  <input id="property_id_stat" type="hidden" name="" value="{{$property->id}}">
  <h2 class="no_results_message"></h2>
  <canvas id="myChart"></canvas>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>

@endsection
