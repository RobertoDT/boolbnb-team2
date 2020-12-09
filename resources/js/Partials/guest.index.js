$(document).ready(function() {

  // Header fissato in alto allo scroll
var stickyOffset = 100;

$(window).scroll(function(){
  var sticky = $('.down');
  var scroll = $(window).scrollTop();
    
  if (scroll >= stickyOffset) {
    sticky.removeClass('fixed_search').addClass('scroll');
  }
  else {
    sticky.removeClass('scroll').addClass('fixed_search');
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

var TxtRotate = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtRotate.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="txt-rt">'+this.txt+'</span>';

  var that = this;
  var delta = 300 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function() {
    that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('txt-rotate');
  for (var i=0; i<elements.length; i++) {
    var toRotate = elements[i].getAttribute('data-rotate');
    var period = elements[i].getAttribute('data-period');
    if (toRotate) {
      new TxtRotate(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".txt-rotate > .txt-rt { border-right: 0.08em solid #666 }";
  document.body.appendChild(css);
};


});

