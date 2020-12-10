$( document ).ready(function() {

  $(".input_sponsor").click(function(){
    var data_sponsor = $(this).attr("data-sponsor");
    $(".sponsor_id").val(data_sponsor);
    var data_duration = $(this).attr("data-duration");
    $(".sponsor_duration").val(data_duration);
  })

});
