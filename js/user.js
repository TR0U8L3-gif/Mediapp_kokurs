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
    if(x.style.display == "block"){
        x.style.display = "none";
    }
    else{
        x.style.display = "block";
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