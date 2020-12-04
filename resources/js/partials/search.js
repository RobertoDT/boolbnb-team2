$( document ).ready(function() {
    // salvo il valore della variabile in una input
    var inputSearch = $("#address").val();
    var radius = 20;

    if(inputSearch.length > 1) {
        getCoordinates(inputSearch,radius);
    }
  
  // al click sul bottone search parte la chiamata ajax a TomTom per ricavare coordinate
  $("#search").click(function() {

    // salvo il valore della variabile in una input
      var inputSearch = $("#address").val();
      var radius = 20;

      if(inputSearch.length > 1) {
         getCoordinates(inputSearch,radius);
      }

  });
  $("#address").keyup(
    function(event) {
      if(event.which == 13) {
        var inputSearch = $("#address").val();
        var radius = 20;

      if(inputSearch.length > 1) {
         getCoordinates(inputSearch, radius);
      }
    }
  }
);
  // autocomplete
  (function() {
    var placesAutocomplete = places({
      appId: 'plWXAPEAGDXR',
      apiKey: '45954f563deec0d78ef4a69018cdb84f',
      container: document.querySelector('#address')
    });
  })();
  // end autocomplete

});
// end document ready

// Api che ottiene le cordinate da indirizzo umano
function getCoordinates(address, radius) {
  // controllo se esiste il valore
  if(address.length != 0) {
    // codifico l'input in formato URI
    var encodetext = encodeURI(address);

    // inserisco l'URI nella API Tom Tom e richiedo le cordinate dell'indirizzo
    $.ajax({
        "url": "https://api.tomtom.com/search/2/geocode/"+encodetext+".json?limit=1&countrySet=IT&key=HzXIu06Pe6tarmbzDYGjNPs5aLa7AlS0",
        "method": "GET",
        "success": function(data){
          // salvo le cordinate in due variabili
          var lat = data.results[0].position.lat;
          var lon = data.results[0].position.lon;
          // richiedo la lista degli apartment che sono all'interno del raggio stabilito
          getProperties(lat, lon, radius);
        },
        "error": function(err) {
            alert("Errore");
        }
    });
  }
}

// Api per ottenere le proprieta
function getProperties(lat, lon, radius){
  // Chiamata ajax per richiedere la lista degli tutti gli apartment nel sito
  $.ajax({
      "url": "http://localhost:8000/api/filterProperties",
      "method": "GET",
      "data": {
        'lat_poi': lat,
        'lon_poi': lon,
        'radius': radius,
      },
      "success": function(data) {
        renderResults (data);
      },
      "error": function(err) {
          alert("Errore");
      }
  });
}


// funzione per renderizzare i risultati
function renderResults (results){
    //preparo il template
    var source = $("#property-template").html();
    var template = Handlebars.compile(source);

    $('.properties_list').html('');
    //ciclo per le properietà
    for (var i = 0; i < results.length; i++) {
      var html = template(results[i]);
      $('.properties_list').append(html);
    }
}
