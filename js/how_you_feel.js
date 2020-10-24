
const url2 = "txt/"+login+".txt";
//console.log(url2);
var date_feel = new Array();
var how_feel = new Array();
var comments_feel = new Array();


function ajax2() {
    return new Promise(function(resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.onload = function() {
        resolve(this.responseText);
      };
      xhr.onerror = reject;
      xhr.open('GET', url2);
      xhr.send();
    });
}
ajax2()
  .then(function(result) {
      var x = 0;
      var length;
      var txt = result.split("\r\n");
      txt.toString();
      //console.log(txt);
      if(txt.length>31){
        length = 31;
      }
      else{
        length=txt.length;
      }
      for(var i = 1; i<length;i+=3){
        date_feel[x]=txt[i];
        how_feel[x]=txt[i+1];
        comments_feel[x]=txt[i+2];
        x++;
    }

    const chart = document.getElementById("lineChart");
    let lineChart = new Chart(chart,{
    type: 'line',
    data: {
      labels: date_feel,
      datasets: [{
          label: 'How you feel',
          data: how_feel,
          borderWidth: 1 
      }]
    },
    options: {
      tooltips: {
        mode: 'nearest',
        intersect: false
      },
      scales: {
          yAxes: [{
              ticks: {
                  beginAtZero: true,
                  max: 9
              }
          }]
      },
    }
    });

  });





