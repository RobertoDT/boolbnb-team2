$( document ).ready(function() {

  var inputSearch = $("#address").val();

  if(inputSearch.length > 1) {
     getCoordinates(inputSearch);
  }
  // al click sul bottone search parte la chiamata ajax a TomTom per ricavare coordinate
  $("#search").click(function() {

    // salvo il valore della variabile in una input
      var inputSearch = $("#address").val();

      if(inputSearch.length > 1) {
         getCoordinates(inputSearch);
      }
      // console.log(inputSearch);

  });
  $("#address").keyup(
    function(event) {
      if(event.which == 13) {
        

        var inputSearch = $("#address").val();

      if(inputSearch.length > 1) {
         getCoordinates(inputSearch);
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

    var $address = document.querySelector('#address-value')
    placesAutocomplete.on('change', function(e) {
      $address.textContent = e.suggestion.value
    });

    placesAutocomplete.on('clear', function() {
      $address.textContent = 'none';
    });

  })();
  // end autocomplete

});
// end document ready

// Api che ottiene le cordinate da indirizzo umano
function getCoordinates(address) {
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
          console.log(lat, lon);
          // richiedo la lista degli apartment che sono all'interno del raggio stabilito
          getProperties(lat, lon);
        },
        "error": function(err) {
            alert("Errore");
        }
    });
  }
}

// Api per ottenere le proprieta
function getProperties(lat, lon){
  // Chiamata ajax per richiedere la lista degli tutti gli apartment nel sito
  $.ajax({
      "url": "http://localhost:8000/api/getproperties",
      "method": "GET",
      "success": function(data) {
        var results = data.properties;
        // creo Json degli Apartments
        createJsonTomTom(results, lat, lon)
      },
      "error": function(err) {
          alert("Errore");
      }
  });
}

// Funzione per creare un Json per Api TomTom
function createJsonTomTom(results, lat, lon) {
  // creo lo scheletro di un Json vuoto per poi andarlo a fillare in maniera che sia leggibile dall'Api del TomTom
  var inputJsonTomTom = {
    "poiList": [],
    "geometryList": []
  };

  // compilo l'oggetto contextGeo con le cordinate del raggio e nella geometryList del Json
  var contextGeo =
  {
      "type": "CIRCLE",
      "position": lat+" "+lon,
      "radius": 20000
  };
  // pusho contextGeo in array geometryList del Json
  inputJsonTomTom.geometryList.push(contextGeo);

  // ciclo i risultati apartment per apartment estrapolo i dati e li inserisco nella poiList del Json
  for (var i = 0; i < results.length; i++) {
    var latApartment = results[i].latitude; //es. 42.589
    var lonApartment = results[i].longitude; //es. 16.564

    // creo contextPoi dove inserire risultati
    var contextPoi =
    {
        "position": {
          "lat": latApartment,
          "lon": lonApartment
        },
        "data": {
          "property": results[i]
        }
    };
    // inserisco il risulato  nell'array poiList
    inputJsonTomTom.poiList.push(contextPoi);
  }
  getResultInRadius(inputJsonTomTom);
}


// Api che restituisce risultati all'interno di un raggio specificato
function getResultInRadius(json) {
  // chiamata POST ad Api per ottenere risultati
  $.ajax({
    "url": "https://api.tomtom.com/search/2/geometryFilter.json?key=HzXIu06Pe6tarmbzDYGjNPs5aLa7AlS0&lat=41.89056&lon=12.49427&radius=20000",
    "method": "POST",
    "dataType": "json",
    "contentType": "application/json; charset=utf-8",
    "data": JSON.stringify(json),
    "success": function(data) {
        // console.log(data);
        renderResults(data);
    },
    "error": function(err) {
        alert("Errore");
    }
  });
}

// funzione per renderizzare i risultati
function renderResults (data){
    var properties = data.results;
    // console.log(properties);
    //preparo il template
    var source = $("#property-template").html();
    var template = Handlebars.compile(source);

    $('.properties_list').html('');
    //ciclo per le properietà
    for (var i = 0; i < properties.length; i++) {

      var property = properties[i].data.property;
      console.log(property);
      // var context = property[i].data.property;
      var context = {
        "id": property.id,
        "flat_image": property.flat_image,
        "title": property.title,
        "description": property.description
      };
      console.log(context);
      var html = template(context);
      $('.properties_list').append(html);
    }
}
