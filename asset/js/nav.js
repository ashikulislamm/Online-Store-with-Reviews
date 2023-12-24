const NavMenu = document.getElementById("nav-menu"),
  navToggle = document.getElementById("nav-toggle"),
  navClose = document.getElementById("nav-close");

/* Menu show */
navToggle.addEventListener("click", () => {
  NavMenu.classList.add("show-menu");
});

/* Menu hidden */
navClose.addEventListener("click", () => {
  NavMenu.classList.remove("show-menu");
});

/*=============== SEARCH ===============*/
const search = document.getElementById("search"),
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