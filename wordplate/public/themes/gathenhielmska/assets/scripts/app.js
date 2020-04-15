/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/scripts/app.js":
/*!**********************************!*\
  !*** ./resources/scripts/app.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// Hamburger menu
var burger = document.querySelector(".hamburger");
var nav = document.querySelector(".nav");
var search = document.querySelector(".search");
var searchIcon = document.querySelector(".search-icon"); // Languages

var flag = document.querySelector(".languages");
var langMenu = document.querySelector(".flag-menu");

var navSlide = function navSlide() {
  burger.addEventListener("click", function () {
    if (burger.classList.contains("toggle")) {
      burger.classList.remove("toggle");
      nav.classList.remove("nav-active");
      langMenu.classList.remove("nav-active");
    } else {
      burger.classList.toggle("toggle");
      nav.classList.toggle("nav-active");
    }
  });
  searchIcon.addEventListener("click", function () {
    search.classList.toggle("search-active");
  });
  flag.addEventListener("click", function () {
    langMenu.classList.toggle("nav-active");

    if (langMenu.classList.contains("nav-active")) {
      burger.classList.toggle("toggle");
    }
  });
};

navSlide(); // Fetching videos

var videosUrl = "http://localhost:1337/wp-json/wp/v2/videos";
var url = "".concat(window.location.origin, "/wp-json/wp/v2/videos"); // Videos-tab

var fetchVideos = document.querySelector(".fetch-videos"); // Div where videos will be appended

var videosArchive = document.querySelector(".archive__videos");
fetchVideos.addEventListener("click", function (e) {
  // Prevents redirection to page
  e.preventDefault(); // Removed the images if the user clicks on videos-tab

  imagesArchive.innerHTML = ""; // Focus

  fetchVideos.classList.add('--active');
  fetchImages.classList.remove('--active');
  fetch(videosUrl).then(function (response) {
    return response.json();
  }).then(function (videos) {
    videos.forEach(function (video) {
      var videoContent = document.createElement("article");
      videoContent.classList.add("archive__videos__single-video");
      videoContent.innerHTML = video.content.rendered;
      videosArchive.appendChild(videoContent);
    });
  });
}); // Fetching images

var imagesUrl = "http://localhost:1337/wp-json/wp/v2/images";
var url2 = "".concat(window.location.origin, "/wp-json/wp/v2/images"); // Images-tab

var fetchImages = document.querySelector(".fetch-images");
var imagesArchive = document.querySelector(".archive__images");
fetchImages.addEventListener("click", function (e) {
  // Prevents redirection to page
  e.preventDefault(); // Removes the videos if the user clicks on images-tab

  videosArchive.innerHTML = ""; // Focus

  fetchImages.classList.add('--active');
  fetchVideos.classList.remove('--active');
  fetch(imagesUrl).then(function (response) {
    return response.json();
  }).then(function (images) {
    images.forEach(function (image) {
      var imageContent = document.createElement("article");
      imageContent.classList.add("archive__images--single-image");
      imageContent.innerHTML = image.content.rendered;
      imagesArchive.appendChild(imageContent);
    });
  });
});

/***/ }),

/***/ "./resources/styles/app.scss":
/*!***********************************!*\
  !*** ./resources/styles/app.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!********************************************************************!*\
  !*** multi ./resources/scripts/app.js ./resources/styles/app.scss ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/cks/Documents/GitHub/gathenhielmska-huset/wordplate/resources/scripts/app.js */"./resources/scripts/app.js");
module.exports = __webpack_require__(/*! /Users/cks/Documents/GitHub/gathenhielmska-huset/wordplate/resources/styles/app.scss */"./resources/styles/app.scss");


/***/ })

/******/ });