var burger = document.querySelector(".menu .menu-logo .burger");
var bars = document.querySelector(".menu .menu-logo .burger .fa-bars");
var cross = document.querySelector(".menu .menu-logo .burger .fa-times");
var burgerMenu = document.querySelector(".burger-menu");

burgerMenu.classList.add("close2");
cross.classList.add("close");

burger.addEventListener("click", function() {
  bars.classList.toggle("close");
  cross.classList.toggle("close");

  burgerMenu.classList.toggle("close2");
});


