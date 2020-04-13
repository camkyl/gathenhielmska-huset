// Hamburger menu
const burger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav");
const search = document.querySelector(".search");
const searchIcon = document.querySelector(".search-icon");
// Languages
const flag = document.querySelector(".languages");
const langMenu = document.querySelector(".flag-menu");

const navSlide = () => {
  burger.addEventListener("click", () => {
    if (burger.classList.contains("toggle")) {
      burger.classList.remove("toggle");
      nav.classList.remove("nav-active");
      langMenu.classList.remove("nav-active");
    }
    else {
      burger.classList.toggle("toggle");
      nav.classList.toggle("nav-active");
    }
  })

  searchIcon.addEventListener("click", () => {
    search.classList.toggle("search-active");
  })

  flag.addEventListener("click", () => {
    langMenu.classList.toggle("nav-active");

    if (langMenu.classList.contains("nav-active")) {
      burger.classList.toggle("toggle");
    }
  })

}

navSlide();

// console.log(burger);
