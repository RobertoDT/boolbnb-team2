$(document).ready(function() {


    $("#submit").click(function(){

        var input = $("#search").val();
        
        if(input.length != 0) {
    
            $.ajax({
                "url": "https://api.tomtom.com/search/2/geometryFilter.json?key=HzXIu06Pe6tarmbzDYGjNPs5aLa7AlS0",
                "method": "GET",
                "data": {
                    "language" : "en-US"
                },
                "success": function(data) {
                    console.log(data);
                },
                "error": function(err) {
                    alert("Errore");
                }
            });
    
        }
    });
    
});
