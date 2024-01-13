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

/*=============== DROPDOWN JS ===============*/
const showDropdown = (content, button) =>{
  const dropdownContent = document.getElementById(content),
        dropdownButton = document.getElementById(button)

  dropdownButton.addEventListener('click', () =>{
     // We add the show-dropdown class, so that the menu is displayed
     dropdownContent.classList.toggle('show-dropdown')
  })
}
showDropdown('dropdown-content','dropdown-button')

/*=============== Cart ===============*/

let iconCart = document.querySelector(".icon-cart");
let closeCart = document.querySelector(".closee");
let body = document.querySelector(".cartTab");

iconCart.addEventListener("click", () => {
  body.classList.add("showCart");
});
closeCart.addEventListener("click", () => {
  body.classList.remove("showCart");
});