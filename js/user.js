textarea1 = document.querySelector("#phone");
        textarea1.addEventListener('input', autoResize, false);

        textarea2 = document.querySelector("#age");
        textarea2.addEventListener('input', autoResize, false);

        textarea3 = document.querySelector("#height");
        textarea3.addEventListener('input', autoResize, false);

        textarea4 = document.querySelector("#weight");
        textarea4.addEventListener('input', autoResize, false);

        textarea5 = document.querySelector("#allergies");
        textarea5.addEventListener('input', autoResize2, false);

        textarea6 = document.querySelector("#diseases");
        textarea6.addEventListener('input', autoResize2, false);

function autoResize() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight-10) + 'px';
}
function autoResize2() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
}

window.onload = function() {
    textarea1.value="";
    textarea2.value="";
    textarea3.value="";
    textarea4.value="";
    textarea5.value="";
    textarea6.value="";
};

function change_user_info(){
    x = document.querySelector("#Change_user_info"); 
    btn = document.querySelector("#change_button"); 
    if(x.style.display == "block"){
        x.style.display = "none";
        btn.textContent  = "Change user info";
    }
    else{
        x.style.display = "block";
        btn.textContent  = "Do not change user info";
    }
}
function checkForSpaces(toCheck) {
    var filter = /^[A-Za-z]+$/;
    var id = toCheck.getAttribute('id');
    var value = toCheck.value;
  
    if(value.includes(" ")) {
        document.getElementById(id).setCustomValidity("It seems you have a space.");
    }
    else if(value.match(filter)) {
        document.getElementById(id).setCustomValidity("Only allow numbers!");
    } 
    else{
        document.getElementById(id).setCustomValidity('');
    }
  }

  var x, i, j, l, ll, selElmnt, a, b, c;
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
document.addEventListener("click", closeAllSelect);

var array = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];

const chart = document.getElementById("lineChart");
let lineChart = new Chart(chart,{
 type: 'line',
 data: {
  labels: array,
  datasets: [{
      label: '# of Votes',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1
  }]
},
options: {
  scales: {
      yAxes: [{
          ticks: {
              beginAtZero: true
          }
      }]
  }
}
});

