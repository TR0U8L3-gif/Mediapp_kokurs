const url = "txt/illneses.txt";

var illnes = new Array();
var description = new Array();
var symptoms = new Array();
var prevention_tips  = new Array();

function ajax() {
    return new Promise(function(resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.onload = function() {
        resolve(this.responseText);
      };
      xhr.onerror = reject;
      xhr.open('GET', url);
      xhr.send();
    });
}
ajax()
  .then(function(result) {
      var x = 0;
      var txt = result.split('\r\n');
      txt.toString();
    for(var i = 5; i<txt.length;i+=5){
        illnes[x]=txt[i].toLowerCase();
        description[x]=txt[i+1];
        symptoms[x]=txt[i+2];
        prevention_tips[x]=txt[i+3];
        x++;
    }
  });

function find_index(text){
    for(var i=0; i<illnes.length; i++){
        if(illnes[i].includes(text)||text.includes(illnes[i])){
            return i;
        }
    }
    return -1;
}





