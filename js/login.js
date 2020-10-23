var password = document.getElementById("password_register")
, confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

var email = document.getElementById("email")
var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
function validateEmail(){
  if(email.value.match(mailformat)) {
    email.setCustomValidity('');
  } else {
    email.setCustomValidity("You have entered an invalid email address!");
  }
}
email.onchange = validateEmail;

function checkForSpaces(toCheck) {
  var filter = /^[A-Za-z0-9]+$/;
  var id = toCheck.getAttribute('id');
  var value = toCheck.value;

   if(value.includes(" ")) {
    document.getElementById(id).setCustomValidity("It seems you have a space.");
  }
  else if(!value.match(filter)) {
    document.getElementById(id).setCustomValidity("Only allow letters and numbers!");
  } 
  else{
    document.getElementById(id).setCustomValidity('');
  }
}
function checkForSpaces2(toCheck) {
  var filter = /^[A-Za-z]+$/;
  var id = toCheck.getAttribute('id');
  var value = toCheck.value;

   if(value.includes(" ")) {
    document.getElementById(id).setCustomValidity("It seems you have a space.");
  }
  else if(!value.match(filter)) {
    document.getElementById(id).setCustomValidity("Only Allow letters!");
  } 
  else{
    document.getElementById(id).setCustomValidity('');
  }
}

window.onload = function() {
    var w = window.innerWidth;
  if(w>=1024){
    var max = w-260;
    sidelog.style.maxWidth = max+"px";
  }
  else if(w<1024){
    sidelog.style.maxWidth = "100%";
  }
    if(!error_login){
       var h = window.innerHeight-290;
       covid_modal.style.height=h+"px"
       modal.style.display = "block"; 
    }
    else{
      change_login_button();
    }

    if(error_register){
      register();
    }
    if(error_reset){
      forget_password();
    }
  count_asrticles();
}

  if(!error_login){
    span.onclick = function() { 
    modal.style.display = "none";  
    }
  }
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }