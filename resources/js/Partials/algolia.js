(function() {
  var placesAutocomplete = places({
    appId: 'plD2BZ3YCS9X',
    apiKey: 'd15f227b04df27ca7267846ac790a5da',
    container: document.querySelector('#form-address'),
    templates: {
      value: function(suggestion) {
        return suggestion.name;
      }
    }
  }).configure({
    type: 'address'
  });
  placesAutocomplete.on('change', function resultSelected(e) {
    document.querySelector('#form-city').value = e.suggestion.city || '';
    document.querySelector('#form-zip').value = e.suggestion.postcode || '';
    document.querySelector('#form-country').value = e.suggestion.country || '';
    document.querySelector('#form-lat').value = e.suggestion.latlng.lat || '';
    document.querySelector('#form-lon').value = e.suggestion.latlng.lng || '';

  });
})();
