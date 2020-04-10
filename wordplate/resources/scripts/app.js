const burger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav");

const navSlide = () => {
  burger.addEventListener("click", () => {

    burger.classList.toggle("toggle");
    nav.classList.toggle("nav-active");

  })
}

navSlide();

// console.log(burger);
