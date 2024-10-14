const banner = document.querySelector(".banner");
banner.style.opacity = 0;
banner.classList.add("fade-in-animation");

const story = document.querySelector(".story");
story.style.opacity = 0;
story.classList.add("fade-in-animation");

const studio = document.querySelector(".studio");
studio.style.opacity = 0;
studio.classList.add("fade-in-animation");

document.addEventListener("DOMContentLoaded", function () {
  var element = document.querySelector(".element-selecteur");
  element.style.opacity = 0;
  element.classList.add("fade-in-animation");
});
