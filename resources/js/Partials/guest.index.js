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

// Prendere il valore inserito nell'input di distanza
var distance = $('#radius').val();
console.log(distance);
$(document).on('change', '#radius', function() {
  var newDistance = $(this).val();
  console.log(newDistance);
});
// Prendere il valore inserito nell'input di distanza

// Prendere il valore inserito negli input della stanza
console.log(roomsNumber, bedsNumber);
$(document).on('change', '#rooms', function() {
  var filterRoomsNumber = $(this).val();
  console.log(filterRoomsNumber);
  var filterBedsNumber = $(this).val();
});
// Prendere il valore inserito negli input della stanza

})

