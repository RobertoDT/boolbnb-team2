$(document).ready(function() {

  // Header fissato in alto allo scroll
var stickyOffset = 100;

$(window).scroll(function(){
  var sticky = $('.down');
  var scroll = $(window).scrollTop();
  // var whiteLine = $('.nav-link .white');
  // console.log(whiteLine);

  if (scroll >= stickyOffset) {
    sticky.removeClass('fixed_search').addClass('scroll');
    $('.regular').removeClass('white').addClass('mixin_font');
  }
  else {
    sticky.removeClass('scroll').addClass('fixed_search');
    $('.regular').addClass('white').removeClass('mixin_font');
  }
  // /Header fissato in alto allo scroll
});

  // Mostrare e togliere filtri
  $(".funnel").click(function() {
  $(".filter_container").toggleClass("d-none");
  })
  // /Mostrare e togliere filtri

//Verificare se i checkbox sono checked o no

// /Verificare se i checkbox sono checked o no

// Creare un array contenente gli extra checkati se la checkbox è checked
// $('#set_result').click(function(){
  // var inputsChecked = [];
  
  // $('#wi-fi').change(function() {
  //   var wiFi = $('#wi-fi').val();
  //   var index = inputsChecked.indexOf(wiFi);
  //   if (index > -1) {
  //     inputsChecked.splice(index, 1);
  //   } else {
  //     inputsChecked.push(wiFi);
  //   }
    // console.log(inputsChecked);

  // });

  // $('#pool').change(function() {
  //   var pool = $('#pool').val();
  //   var index = inputsChecked.indexOf(pool);
  //   if (index > -1) {
  //     inputsChecked.splice(index, 1);
  //   } else {
  //     inputsChecked.push(pool);
  //   }
    // console.log(inputsChecked);

  // });

  // $('#parking').change(function() {
  //   var parking = $('#parking').val();
  //   var index = inputsChecked.indexOf(parking);
  //   if (index > -1) {
  //     inputsChecked.splice(index, 1);
  //   } else {
  //     inputsChecked.push(parking);
  //   }
    // console.log(inputsChecked);

  // });

  // $('#reception').change(function() {
  //   var reception = $('#reception').val();
  //   var index = inputsChecked.indexOf(reception);
  //   if (index > -1) {
  //     inputsChecked.splice(index, 1);
  //   } else {
  //     inputsChecked.push(reception);
  //   }
    // console.log(inputsChecked);
  // });

  // $('#sea-view').change(function() {
  //   var seaView = $('#sea-view').val();
  //   var index = inputsChecked.indexOf(seaView);
  //   if (index > -1) {
  //     inputsChecked.splice(index, 1);
  //   } else {
  //     inputsChecked.push(seaView);
  //   }
    // console.log(inputsChecked);
  // });

  // $('#sauna').change(function() {
  //   var sauna = $('#sauna').val();
  //   var index = inputsChecked.indexOf(sauna);
  //   if (index > -1) {
  //     inputsChecked.splice(index, 1);
  //   } else {
  //     inputsChecked.push(sauna);
  //   }
    // console.log(inputsChecked);
  // });

  // console.log(inputsChecked);
  // var extrasString = inputsChecked.toString();
  // console.log(extrasString);

//   $('#set_result').click(function(){
    
//     var inputsChecked = [];
    
//     if ($('input[id="wi-fi"]').is(":checked")) {
//     inputsChecked.push($('input[id="wi-fi"]').val());
//   } 
//   if ($('input[id="pool"]').is(":checked")) {
//     inputsChecked.push($('input[id="pool"]').val());
//   } 
//   if ($('input[id="sea-view"]').is(":checked")) {
//     inputsChecked.push($('input[id="sea-view"]').val());
//   } 
//   if ($('input[id="parking"]').is(":checked")) {
//     inputsChecked.push($('input[id="parking"]').val());
//   } 
//   if ($('input[id="sauna"]').is(":checked")) {
//     inputsChecked.push($('input[id="sauna"]').val());
//   } 
//   if ($('input[id="reception"]').is(":checked")) {
//     inputsChecked.push($('input[id="reception"]').val());
//   } 
//   console.log(inputsChecked);
//   var extrasString = inputsChecked.toString();
//   console.log(extrasString);

//   // Prendere il valore inserito negli input della stanza
// // console.log(roomsNumber, bedsNumber);

//   var rooms = $('#rooms').val();
//   console.log(rooms);

//   var beds = $('#beds').val();
//   console.log(beds);

//   var mq = $('#mq').val();
//   console.log(mq);

//   var bathrooms = $('#bathrooms').val();
//   console.log(bathrooms);

// // Prendere il valore inserito negli input della stanza

// // Prendere il valore inserito nell'input di distanza

// var radius = $('#radius').val();
// console.log(radius);
// // Prendere il valore inserito nell'input di distanza

// getProperties(lat, lon, radius, extras, rooms, beds, bathrooms, mq);


// });
// });

// /Creare un array contenente gli extra checkati


});

