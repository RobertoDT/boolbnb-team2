$(document).ready(function() {

var stickyOffset = 100;

$(window).scroll(function(){
  var sticky = $('#app');
  var scroll = $(window).scrollTop();
    
  if (scroll >= stickyOffset) sticky.removeClass('fixed_search').addClass('scroll');
  else sticky.removeClass('scroll').addClass('fixed_search');
});

$(".funnel").click(function() {
  $(".filter_container").toggleClass("d-none");
})

});