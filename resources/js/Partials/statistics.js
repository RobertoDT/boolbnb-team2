$( document ).ready(function() {

property_id = 44;
// date_request = "2020-11";


$("#bday-month").change(function(){

  // alert($(this).val());
  date_request = $(this).val();
  getStatistics(property_id, date_request);
});

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var mese = mm.toString();
var yyyy = today.getFullYear();
var anno = yyyy.toString();
var dateNow = anno+"-"+mese;
$("#bday-month").val(dateNow);

getStatistics(property_id, date_request);

});

//funzione per inviare range di tempo per mostrare statistiche
function getStatistics(property_id, date_request){
  $.ajax({
    "url" : "http://localhost:8000/api/getStatistics",
    "method" : "GET",
    "data" : {
      "property_id" : property_id,
      "date_request" : date_request
    },
    "success" : function(data){

      renderStatistics(data.labels, data.data);

    },
    "error" : function(error){
      alert(error);
    }
  });
}

function renderStatistics(labels, data){

  var new_array = [];
  for (var i = 0; i < labels.length; i++) {
    var new_date = new Date (labels[i]);
    new_array.push(new_date);
  }

  var ctx = document.getElementById("myChart").getContext("2d");


  var gradientFill = ctx.createLinearGradient(500, 0, 100, 0);
  gradientFill.addColorStop(0, "rgba(0, 0, 255, 0.6)");
  gradientFill.addColorStop(1, "rgba(244, 144, 128, 0.6)");


  Chart.defaults.global.defaultFontFamily = 'Lato';
  Chart.defaults.global.defaultFontSize = 18;
  Chart.defaults.global.defaultFontColor = "black";

      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: new_array,
              datasets: [{
              label: "Novembre 2020",
              borderColor: '#5E61DD',
              borderWidth: 1,
              pointHoverRadius: 6,
              data: data,
              backgroundColor: gradientFill
              }]
          },
          options: {
              legend: {
              position: "bottom"
          },
              title:{
                      display:true,
                      text:"VISUALIZZAZIONI APPARTAMENTO",
                      fontColor: gradientFill,
                      fontSize: 22,
                      padding:40
                   },
              scales: {
                  yAxes: [{
                      ticks:{
                          beginAtZero: true
                      },
                  }],
                  xAxes: [{
                      type: 'time',
                      time: {
                          unit: 'day',
                          displayFormats: {
                              'millisecond': 'MMM DD',
                              'second': 'MMM DD',
                              'minute': 'MMM DD',
                              'hour': 'MMM DD',
                              'day': 'DD',
                              'week': 'MMM DD',
                              'month': 'MMM DD',
                              'quarter': 'MMM DD',
                              'year': 'MMM DD',
                          },

                      }
                  }],
              },
          }
      });

}
