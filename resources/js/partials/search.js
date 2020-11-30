// var inputData2 = {
//   "poiList": [
//     {
//       "poi": {
//         "name": "piazza navona"
//       },
//       "address": {
//         "freeformAddress": "piazza navona, roma"
//       },
//       "position": {
//         "lat": 41.89913,
//         "lon": 12.4732
//       }
//     },
//     {
//       "poi": {
//         "name": "piazza di spagna"
//       },
//       "address": {
//         "freeformAddress": "piazza di spagna, roma"
//       },
//       "position": {
//         "lat": 41.90568,
//         "lon": 12.48231
//       }
//     },
//     {
//       "poi": {
//         "name": "milano"
//       },
//       "address": {
//         "freeformAddress": "piazza del duomo, milano"
//       },
//       "position": {
//         "lat": 45.46369,
//         "lon":  9.19049
//       },
//       "id": {
//         "id": 1
//       }
//     }
//   ],
//   "geometryList": [
//     {
//       "type": "CIRCLE",
//       "position": "41.89056 12.49427",
//       "radius": 20000
//     }
//   ]
// };

$(document).ready(function() {

  $( document ).on( "click", "#submit", function() {
    var inputtext = $("#search").val();
    console.log(inputtext);

    if(inputtext.length != 0) {

      var encodetext = encodeURI(inputtext);

          $.ajax({
              "url": "https://api.tomtom.com/search/2/geocode/"+encodetext+".json?limit=1&countrySet=IT&key=HzXIu06Pe6tarmbzDYGjNPs5aLa7AlS0",
              "method": "GET",
              "success": function(data){
                console.log(data);
                var latitude = data.results[0].position.lat;
                var longitude = data.results[0].position.lat;
                getproperties(latitude, longitude);
                // console.log(latitude, longitude);
              },
              "error": function(err) {
                  alert("Errore");
              }
          });
    }
  });

});
function getproperties(lat, long){

  $.ajax({
      "url": "http://localhost:8000/api/getproperties",
      "method": "GET",
      "success": function(data) {
        var results = data.properties;
        var inputData = {
            "poiList": [],
            "geometryList": []
        };
        // inserisco i dati risultanti dalla ricerca
        var contextGeo =
        {
            "type": "CIRCLE",
            "position": lat+" "+long,
            "radius": 20000
        };
        // inserisco contextGeo in array geometryList
        inputData.geometryList.push(contextGeo);


        for (var i = 0; i < results.length; i++) {
          var id = results[i].id;
          var lat = results[i].latitude;
          var long = results[i].longitude;

          // console.log(lat);
          // console.log(long);

          // creo contextPoi dove inserire risultati
          var contextPoi =
          {
              "poi": {
                "name": "property"
              },
              "address": {
                "freeformAddress": "address"
              },
              "position": {
                "lat": lat,
                "lon": long
              }
          };
          // inserisco il risulato  nell'array poiList
          inputData.poiList.push(contextPoi);

        }
        // console.log(inputData);

        $.ajax({
            "url": "https://api.tomtom.com/search/2/geometryFilter.json?key=HzXIu06Pe6tarmbzDYGjNPs5aLa7AlS0",
            "method": "POST",
            "dataType": "json",
            "contentType": "application/json; charset=utf-8",
            "data": JSON.stringify(inputData),
            "success": function(data) {
                console.log(data);
            },
            "error": function(err) {
                alert("Errore");
            }
        });
      },
      "error": function(err) {
          alert("Errore");
      }
  });
}
