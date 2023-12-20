var NAVMENU = document.getElementById("nav-menu"),
  navToggle = document.getElementById("nav-toggle"),
  navClose = document.getElementById("nav-close");

/* Menu show */
navToggle.addEventListener("click", () => {
  NAVMENU.classList.add("show-menu");
});

/* Menu hidden */
navClose.addEventListener("click", () => {
  NAVMENU.classList.remove("show-menu");
});

/*=============== SEARCH ===============*/
var search = document.getElementById("search"),
  searchBtn = document.getElementById("search-btn"),
  searchClose = document.getElementById("search-close");

/* Search show */
searchBtn.addEventListener("click", () => {
  search.classList.add("show-search");
});

/* Search hidden */
searchClose.addEventListener("click", () => {
  search.classList.remove("show-search");
});

var loginmenu = document.getElementById('sub-menu-wrap'),
      loginBtn = document.getElementById('login-btn')

/* Login show */
loginBtn.addEventListener('click', () =>{
  loginmenu.classList.toggle('open')
});

var subDiv = document.getElementById("subdiv");
var subClose = document.getElementById("sub_close");
var subBtn = document.getElementById("footer__btn");

subBtn.addEventListener("click" , function(){
  subDiv.classList.add("show_sub");
});

subClose.addEventListener("click" , function(){
  subDiv.classList.remove("show_sub");
});
