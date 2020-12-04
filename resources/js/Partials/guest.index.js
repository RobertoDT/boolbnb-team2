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
  // Barra search hide-show

  var show = $( "#navbarSupportedContent" );
  $(document).on( 'click', show, function(){
    if (show.hasClass('show') ) {
      console.log("the tab is already active");
  }   
    else {
      console.log("selected");
  }  
  });

  // show.on('click','#navbarSupportedContent')
     

  // $( "li" ).click(function() {            
  //     if (i == true ) {
  //         console.log("the tab is already active");
  //     }   
  //     else {
  //         console.log("selected");
  //     }      
  // });
    // Barra search hide-show

})

