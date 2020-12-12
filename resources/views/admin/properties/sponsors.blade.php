<!-- pagina view per i pagamenti -->
@extends("layouts.main")

@section('title', 'BoolBnB')

@section('header')
    @include('layouts.header-general')
@endsection

@section("mainContent")
<div class="container p_bottom_50">
  <h1>Sponsorizzazioni</h1>
  @if(session('sponsor_active_message'))
    <div class="alert alert-danger">
      {{session('sponsor_active_message')}}
    </div>
  @endif
  @if(count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form class="form_sponsors" method="post" id="payment-form" action="{{route('admin.sponsors.store')}}">

  @csrf
  @method('POST')

    <section class="chose_property">
      <h2 class="premium_name">Seleziona la proprietà che vorresti sposorizzare</h2>
      <select id="select_property" class="" name="property_id" required>
        <option value="" selected disabled hidden>Seleziona la proprietà</option>
        @foreach($properties as $property)
        <option value="{{$property->id}}">{{$property->title}}</option>
        @endforeach
      </select>
    </section>

    <section>
        <label for="amount">
            <h2 class="input-label premium_name">Seleziona il tipo di sponsorizzazione</h2>
            <div class="input-wrapper amount-wrapper">
              @foreach($sponsors as $sponsor)
                <input class="input_sponsor" type="radio" id="{{$sponsor->name}}" data-duration="{{$sponsor->duration}}" data-sponsor="{{$sponsor->id}}" name="amount" value="{{$sponsor->price}}" required>
                <label for="sponsor">{{$sponsor->name." con durata ".$sponsor->duration."h ad un prezzo di " .$sponsor->price ."€"}}</label><br>
              @endforeach
            </div>
        </label>
        <input class="sponsor_id" type="hidden" name="sponsor_id" value="">
        <input class="sponsor_duration" type="hidden" name="duration" value="">
        <div class="bt-drop-in-wrapper">
            <div id="bt-dropin"></div>
        </div>
    </section>

    <input id="nonce" name="payment_method_nonce" type="hidden" />
    <button class="btn modifing_link" type="submit"><span>Sponsorizza</span></button>
  </form>
</div>

{{-- SCRIPT BRAINTREE --}}

<script src="https://js.braintreegateway.com/web/dropin/1.25.0/js/dropin.min.js"></script>
<script>
    var form = document.querySelector('#payment-form');
    var client_token = "{{$token}}";

    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function (event) {
        event.preventDefault();

        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            return;
          }

          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
</script>

@endsection
