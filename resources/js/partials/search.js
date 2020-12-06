const { isEmpty } = require("lodash");

$( document ).ready(function() {
  // RESETTA IMPUT
  // $('#address').attr('value', "");
  // $('#address').val("");


  
  // variabile globale per extras
  extrasString = "";

  // CONTROLLO SE IL DATA_ADDRESS E' STATO COMPILATO
  // DALLA RICERCA DI ALTRE PAGINE OPPURE NO
  if ($('#address').val().length > 0) { //ISSET
    var humanAddress = $('#address').val();
      $('#address').attr('value', "");
      $('#address').val("");
    if (humanAddress.length > 2) {
      console.log(humanAddress);
      getCoordinatesTomTom(humanAddress);
    }
  }

  $( document ).on( "click", "#search", function() {
    if ($('#address').val().length > 2) {
      var humanAddress = $('#address').val();
      $('#address').attr('value', "");
      $('#address').val("");
      console.log(humanAddress);
      getCoordinatesTomTom(humanAddress);
    } else {
      alert('La tua ricerca deve includere almeno 3 caratteri. Grazie!')
    }
  });


  // SEARCH PREMENDO INVIO
  $(".address_search_input").keyup(
    function(event) {
      if(event.which == 13) {
        if ($('#address').val().length > 2) {
          var humanAddress = $('#address').val();
          $('#address').attr('value', "");
          $('#address').val("");
          console.log(humanAddress);
          getCoordinatesTomTom(humanAddress);
        } else {
          alert('La tua ricerca deve includere almeno 3 caratteri. Grazie!')
        }
    }
  });

  // AUTOCOMPLETE
  (function() {
    var placesAutocomplete = places({
      appId: 'plWXAPEAGDXR',
      apiKey: '45954f563deec0d78ef4a69018cdb84f',
      container: document.querySelector('#address')
    });

    if (document.querySelector('#address-value') != null) {
      var $address = document.querySelector('#address-value');
    }
    
      
    // placesAutocomplete.on('change', function(e) {
    //   $address.textContent = e.suggestion.value;
    // });


    // placesAutocomplete.on('clear', function() {
    //   $address.textContent = 'none';
    // });

  })();
  // END AUTOCOMPLETE

});
// end document ready

// TOM TOM 
function getCoordinatesTomTom(address) {
  // controllo se esiste il valore
  if(address.length > 3) {
    // codifico l'input in formato URI
    var encodetext = encodeURI(address);

    // inserisco l'URI nella API Tom Tom e richiedo le cordinate dell'indirizzo
    $.ajax({
        "url": "https://api.tomtom.com/search/2/geocode/"+encodetext+".json?limit=1&countrySet=IT&key=HzXIu06Pe6tarmbzDYGjNPs5aLa7AlS0",
        "method": "GET",
        "success": function(data){
            // FARE UN CONTROLLO SUI DATI IN ENTRATA
            if (!isEmpty(data)) {
              // salvo le cordinate in due variabili
              var lat = data.results[0].position.lat;
              var lon = data.results[0].position.lon;
              console.log('getCoordinates', lat, lon);
              // setto i parametri per inviare la query
              setParameters(lat, lon);
              
            }

        },
        "error": function(err) {
            alert("Errore");
        }
    });
  }
}
// END TOM TOM

// SETTO LE VARIABILI DA INVIARE A BACK END
function setParameters(lat, lon) {
  // variabili fondamentali per la ricerca
  
  if (lat > 0 && lon > 0) {
    // RADIUS
    if ($('#radius').val() != "") {
      var radius = $('#radius').val();
    } else {
      var radius = 20;
    }

    // ROOMS
    if ($('#rooms').val() != "") {
      var rooms = $('#rooms').val();
    } else {
      var rooms = 1;
    }

    // BEDS
    if ($('#beds').val() != "") {
      var beds = $('#beds').val();
    } else {
      var beds = 1;
    }

    // BATHROOMS
    if ($('#bathrooms').val() != "") {
      var bathrooms = $('#bathrooms').val();
    } else {
      var bathrooms = 1;
    }

    // BATHROOMS
    if ($('#mq').val() != "") {
      var mq = $('#mq').val();
    } else {
      var mq = 1;
    }

    // EXTRAS
    if (extrasString.length > 0) {
      var extras = extrasString;
    } else {
      var extras = 0;
    }

    console.log("EXTRAS", extras,"radius", radius,"extras", extras,"rooms", rooms,"beds", beds,"bathrooms", bathrooms,"mq", mq);

    getProperties(lat, lon, radius, extras, rooms, beds, bathrooms, mq);
    
  } 
}

// Api per ottenere le proprieta
function getProperties(lat, lon, radius, extras, rooms, beds, bathrooms, mq){
  // Chiamata ajax per richiedere la lista degli tutti gli apartment nel sito
  $.ajax({
      "url": "http://localhost:8000/api/filterProperties",
      "method": "GET",
      "data": {
        'lat_poi': lat,
        'lon_poi': lon,
        'radius': radius,
        'extras': extras,
        'rooms': rooms,
        'beds': beds,
        'bathrooms': bathrooms,
        'mq': mq
      },
      "success": function(data) {
      // controllo dati in entrata
      if (!isEmpty(data)) {
        console.log(data);
        $('.properties_list').html("");
        // renderizzo la nuova lista
        renderResults (data);
      }

      },
      "error": function(error) {
          alert(error);
      }
  });
}


// funzione per renderizzare i risultati
function renderResults (results){
  // SPONSORED
  if (results.sponsored.length > 0) {
    // salvo lista sponsorizzati
    var sponsored = results.sponsored;
    //preparo il template per SPONSORIZZATI
    var source = $("#property-template").html();
    var template = Handlebars.compile(source);
    //ciclo e appendo in dom
    for (var i = 0; i < sponsored.length; i++) {
      var html = template(sponsored[i]);
      // inserisco i nuovi risultati
      $('.sponsored').append(html);
    }
  }

  // NOT SPONSORED
  if (results.not_sponsored.length > 0) {
    // salvo lista NON sponsorizzati
    var notSponsored = results.not_sponsored;
    //preparo il template per NON sponsorizzati
    var source = $("#property-template").html();
    var template = Handlebars.compile(source);
    //ciclo per le properietà
    for (var i = 0; i < notSponsored.length; i++) {
      var html = template(notSponsored[i]);
      $('.not_sponsored').append(html);
    }
  }

}
