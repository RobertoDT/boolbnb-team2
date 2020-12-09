$(document).ready(function() {

  // Header fissato in alto allo scroll
var stickyOffset = 100;

$(window).scroll(function(){
  var sticky = $('.down');
  var scroll = $(window).scrollTop();

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

});

