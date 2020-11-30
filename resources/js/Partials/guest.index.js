$(document).ready(function() {

  // $(window).scroll(function() {

  //     $("#app").removeClass('absolute_search').addClass('fixed_search');
  // })

//   var lastScrollTop = 0;
//   $(window).scroll(function(event){
//    var st = $(this).scrollTop();
//    if (st > lastScrollTop){
//     $("#app").removeClass('absolute_search').addClass('fixed_search');
//    } else {
//     $("#app").removeClass('fixed_search').addClass('absolute_search');
//    }
//    lastScrollTop = st;
// });
var stickyOffset = 100;

$(window).scroll(function(){
  var sticky = $('#app');
  var scroll = $(window).scrollTop();
    
  if (scroll >= stickyOffset) sticky.removeClass('fixed_search').addClass('scroll');
  else sticky.removeClass('scroll').addClass('fixed_search');
});
});