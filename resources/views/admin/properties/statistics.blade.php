@extends("layouts.main")

@include('layouts.header-general')

@section("mainContent")

<div class="container">

  <input id="bday-month" type="month" name="bday-month" value="">
  <input type="hidden" name="" value="">
  <canvas id="myChart"></canvas>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>

@endsection
