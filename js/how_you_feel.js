
const url2 = "txt/"+login+".txt";
//console.log(url2);
var date_feel = new Array();
var how_feel = new Array();
var comments_feel = new Array();

var date= new Array();
var how = new Array();

window.onload = load();
function load()
{
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
      var b = 18;
      if(txt.length>b){
        length = txt.length-b;
      }
      else{
        length=1;
      }
      
      for(var i = length; i<txt.length;i+=3){
        date_feel[x]=txt[i];
        how_feel[x]=txt[i+1];
        comments_feel[x]=txt[i+2];
        x++;
      }
      console.log(date_feel);
      console.log(how_feel);
      x=0;
      for(var i=date_feel.length; i>0; i--){
        date[x]=date_feel[i-1];
        x++;
      }
      x=0;
      for(var i=how_feel.length; i>0; i--){
        how[x]=how_feel[i-1];
        x++;
      }
      console.log(date);
      console.log(how);

    const chart = document.getElementById("lineChart");
    let lineChart = new Chart(chart,{
    type: 'line',
    data: {
      labels: date,
      datasets: [{
          label: 'How you feel',
          data: how,
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
}




