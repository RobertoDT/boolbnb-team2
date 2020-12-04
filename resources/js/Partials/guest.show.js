if(document.getElementById('latitude') != null && document.getElementById('longitude') != null) {
    var latitude = document.getElementById('latitude').value;
    var longitude = document.getElementById('longitude').value;
  

  (function() {
    var latlng = {
      lat: latitude,
      lng: longitude
    };
  
    var placesAutocomplete = places({
      appId: 'plD2BZ3YCS9X',
      apiKey: 'd15f227b04df27ca7267846ac790a5da',
      container: document.querySelector('#input-map-paris')
    }).configure({
      aroundLatLng: latlng.lat + ',' + latlng.lng, // input latlong
      aroundRadius: 0, // no radius
      type: 'address'
    });
  
    var map = L.map('map-example-container-paris', {
      scrollWheelZoom: true,
      zoomControl: true
    });
  
    var osmLayer = new L.TileLayer(
      'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        minZoom: 6,
        maxZoom: 18,
        attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
      }
    );
  
    var markers = [];
  
  
    var marker = L.marker(latlng, {opacity: 1});
      marker.addTo(map);
      markers.push(marker);


    map.setView(new L.LatLng(latlng.lat, latlng.lng), 12);
    map.addLayer(osmLayer);
  
    function handleOnSuggestions(e) {
      markers.forEach(removeMarker);
      markers = [];
    }

})();
}
