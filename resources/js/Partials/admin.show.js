// var latitude = document.getElementById('latitude').value;
//     var longitude = document.getElementById('longitude').value;

//   (function() {
//     var latlng = {
//       lat: latitude,
//       lng: longitude
//     };
  
//     var placesAutocomplete = places({
//       appId: 'plD2BZ3YCS9X',
//       apiKey: 'd15f227b04df27ca7267846ac790a5da',
//       container: document.querySelector('#input-map-paris')
//     }).configure({
//       aroundLatLng: latlng.lat + ',' + latlng.lng, // input latlong
//       aroundRadius: 0, // no radius
//       type: 'address'
//     });
  
//     var map = L.map('map-example-container-paris', {
//       scrollWheelZoom: true,
//       zoomControl: true
//     });
  
//     var osmLayer = new L.TileLayer(
//       'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//         minZoom: 6,
//         maxZoom: 18,
//         attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
//       }
//     );
  
//     var markers = [];
  
  
//     var marker = L.marker(latlng, {opacity: 1});
//       marker.addTo(map);
//       markers.push(marker);


//     map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
//     map.addLayer(osmLayer);
  
//     function handleOnSuggestions(e) {
//       markers.forEach(removeMarker);
//       markers = [];
      

//       if (e.suggestions.length === 0) {
//         map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
//         return;
//       }
  
//       e.suggestions.forEach(addMarker);
//       findBestZoom();
//     }
  
//     function handleOnChange(e) {
//       markers
//         .forEach(function(marker, markerIndex) {
//           if (markerIndex === e.suggestionIndex) {
//             markers = [marker];
//             marker.setOpacity(1);
//             findBestZoom();
//           } else {
//             removeMarker(marker);
//           }
//         });
//     }
  
//     function handleOnClear() {
//       map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
//     }
  
//     function handleOnCursorchanged(e) {
//       markers
//         .forEach(function(marker, markerIndex) {
//           if (markerIndex === e.suggestionIndex) {
//             marker.setOpacity(1);
//             marker.setZIndexOffset(1000);
//         } else {
//           marker.setZIndexOffset(0);
//           marker.setOpacity(0.5);
//         }
//       });
//   }

//   function addMarker(suggestion) {
//     var marker = L.marker(suggestion.latlng, {opacity: .4});
//     marker.addTo(map);
//     markers.push(marker);
//   }

//   function removeMarker(marker) {
//     map.removeLayer(marker);
//   }

//   function findBestZoom() {
//     var featureGroup = L.featureGroup(markers);
//     map.fitBounds(featureGroup.getBounds().pad(0.5), {animate: false});
//   }
// })();
