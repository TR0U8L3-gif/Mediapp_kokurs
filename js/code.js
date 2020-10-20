var modal = document.getElementById("myModal");
var covid_modal = document.getElementById("covid_modal");
var span = document.getElementsByClassName("close")[0];
var menu_bar = false; //fales = closed 
var login_bar = false; //fales = closed 
var this_menu = document.getElementById("button_menu");
var this_login = document.getElementById("login");


function change_menu_button() {
  menu_bar = !menu_bar;
  if(!menu_bar)
  {
	closeNav();
  }
  else
  {
	if(login_bar)
	{
		change_login_button();
	}
	openNav() ; 
  }
}

function change_login_button() {
  login_bar = !login_bar;
  if(!login_bar)
  {
	closeLog();
  }
  else
  {
	if(menu_bar)
	{
		change_menu_button();
	}
	openLog(); 
  }
}

function openNav() {
  this_menu.classList.add("change");
  document.getElementById("mySidenav").style.width = "260px";
}

function closeNav() {
  this_menu.classList.remove("change")
  document.getElementById("mySidenav").style.width = "0";
}

function openLog() {
  this_login.classList.add("change");
  document.getElementById("mySidelog").style.width = "100%";
}

function closeLog() {
  this_login.classList.remove("change")
  document.getElementById("mySidelog").style.width = "0";
}
function login() {
  document.getElementById("register_box").style.display ="none";
  document.getElementById("login_box").style.display = "block";
  document.getElementById("register_box_b").style.display ="none";
  document.getElementById("login_box_b").style.display = "block";
  document.getElementById("forgot_password_box").style.display = "none";
  document.getElementById("forgot_password_box_b").style.display = "block";
}
function register() {
  document.getElementById("login_box").style.display = "none";
  document.getElementById("register_box").style.display = "block";
  document.getElementById("login_box_b").style.display = "none";
  document.getElementById("register_box_b").style.display = "block";
  document.getElementById("forgot_password_box").style.display = "none";
  document.getElementById("forgot_password_box_b").style.display = "block";
}

function forget_password() {
  document.getElementById("login_box").style.display = "none";
  document.getElementById("register_box").style.display = "none";
  document.getElementById("login_box_b").style.display = "block";
  document.getElementById("register_box_b").style.display = "block";
  document.getElementById("forgot_password_box").style.display = "block";
  document.getElementById("forgot_password_box_b").style.display = "none";
}

function screenSize(x) {
  if (s_size.matches) { // If media query matches
     closeNav();
  } else {
     openNav();
  }
}
var s_size = window.matchMedia("(max-width: 1024px)");
screenSize(s_size);

var sidelog = document.querySelector(".sidelog");
var sidenav = document.querySelector(".sidenav");
window.onresize = function() {
var w = window.innerWidth;
if(w>=1024){
  var max = w-260;
  sidelog.style.maxWidth = max+"px";
  openNav();
}
else if(w<1024){
  sidelog.style.maxWidth = "100%";
  closeNav();
}
};


