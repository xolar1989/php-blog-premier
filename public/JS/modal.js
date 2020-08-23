var modal = document.getElementById("Modal");

var Btn = document.getElementById("Btn-modal");

$("#close-modal").click(function() {
  modal.style.display = "none";
});

Btn.addEventListener("click", function() {
  modal.style.display = "block";
});
