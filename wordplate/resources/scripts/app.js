const burger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav");
const search = document.querySelector(".search");
const searchIcon = document.querySelector(".search-icon");

const navSlide = () => {
  burger.addEventListener("click", () => {

    burger.classList.toggle("toggle");
    nav.classList.toggle("nav-active");
  })

  searchIcon.addEventListener("click", () => {
    search.classList.toggle("search-active");
  })
}

navSlide();

// console.log(burger);
