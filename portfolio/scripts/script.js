//Hamburger menu function
function menu() {
  var x = document.getElementById("mobileNav");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}