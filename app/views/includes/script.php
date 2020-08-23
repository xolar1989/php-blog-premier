<script>
var menuItems = document.querySelectorAll(" .normalbtn a");



menuItems.forEach(item => {
    
  if (window.location.href   == item.getAttribute("href")) {
    if (item.classList.contains("mobile")) {
      item.classList.add("burgerActive");
    } else {
      item.classList.add("active");
    }
  }
  if(window.location.href == "http://192.168.56.10:8080/users/photos"  || window.location.href == "http://192.168.56.10:8080/users/search" ){
    if (menuItems[2].classList.contains("mobile")) {
        menuItems[2].classList.add("burgerActive");
    } else {
        menuItems[2].classList.add("active");
    }
}



});






</script>