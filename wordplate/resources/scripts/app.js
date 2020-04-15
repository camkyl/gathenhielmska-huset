// Hamburger menu
const burger = document.querySelector(".hamburger");
const nav = document.querySelector(".nav");
const search = document.querySelector(".search");
const searchIcon = document.querySelector(".search-icon");
const searchDesktop = document.querySelector(".search-desktop");
// Languages
const flag = document.querySelector(".languages");
const langMenu = document.querySelector(".flag-menu");

const navSlide = () => {
  burger.addEventListener("click", () => {
    if (burger.classList.contains("toggle")) {
      burger.classList.remove("toggle");
      nav.classList.remove("nav-active");
      langMenu.classList.remove("nav-active");
    } else {
      burger.classList.toggle("toggle");
      nav.classList.toggle("nav-active");
    }
  });

  searchIcon.addEventListener("click", () => {
    search.classList.toggle("search-active");
    searchDesktop.classList.toggle("search-desktop-active");
  });

  flag.addEventListener("click", () => {
    langMenu.classList.toggle("nav-active");
    burger.classList.remove("toggle");

    if (langMenu.classList.contains("nav-active")) {
      burger.classList.toggle("toggle");
    }
  });
};

navSlide();

// Fetching videos
// const videosUrl = "http://localhost:1337/wp-json/wp/v2/videos";
const videosUrl = `${window.location.origin}/wp-json/wp/v2/videos`;

// Videos-tab
const fetchVideos = document.querySelector(".fetch-videos");

// Div where videos will be appended
const videosArchive = document.querySelector(".archive__videos");

fetchVideos.addEventListener("click", e => {
  // Prevents redirection to page
  e.preventDefault();

  // Removed the images if the user clicks on videos-tab
  imagesArchive.innerHTML = "";

  // Focus
  fetchVideos.classList.add("--active");
  fetchImages.classList.remove("--active");

  fetch(videosUrl)
    .then(response => response.json())
    .then(videos => {
      videos.forEach(video => {
        const videoContent = document.createElement("article");
        videoContent.classList.add("archive__videos__single-video");
        videoContent.innerHTML = video.content.rendered;
        videosArchive.appendChild(videoContent);
      });
    });
});

// Fetching images
//const imagesUrl = "http://localhost:1337/wp-json/wp/v2/images";
const imagesUrl = `${window.location.origin}/wp-json/wp/v2/images`;

// Images-tab
const fetchImages = document.querySelector(".fetch-images");
const imagesArchive = document.querySelector(".archive__images");

fetchImages.addEventListener("click", e => {
  // Prevents redirection to page
  e.preventDefault();

  // Removes the videos if the user clicks on images-tab
  videosArchive.innerHTML = "";

  // Focus
  fetchImages.classList.add("--active");
  fetchVideos.classList.remove("--active");

  fetch(imagesUrl)
    .then(response => response.json())
    .then(images => {
      images.forEach(image => {
        const imageContent = document.createElement("article");
        imageContent.classList.add("archive__images--single-image");
        imageContent.innerHTML = image.content.rendered;
        imagesArchive.appendChild(imageContent);
      });
    });
});

// Fetch images on page load
const path = window.location.pathname;

if (path === "/arkiv/") {
  window.addEventListener("load", e => {
    e.preventDefault();

    fetchImages.classList.add("--active");
    fetchVideos.classList.remove("--active");

    fetch(imagesUrl)
      .then(response => response.json())
      .then(images => {
        images.forEach(image => {
          const imageContent = document.createElement("article");
          imageContent.classList.add("archive__images--single-image");
          imageContent.innerHTML = image.content.rendered;
          imagesArchive.appendChild(imageContent);
        });
      });
  });
}
