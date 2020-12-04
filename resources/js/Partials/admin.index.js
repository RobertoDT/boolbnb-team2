$( document ).ready(function() {
    $('.menu-nav').click(function(){
        openNav();
    });
    $('.closebtn').click(function(){
        closeNav();
    });
    
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
    
    })
    