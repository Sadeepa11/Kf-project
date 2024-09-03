// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");
// let users = document.querySelector(".users");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
  users.classList.toggle("active");
};

function logOut() {


  alert("You are logged out !!!");

}



function changeView(view) {
  var views = ["general", "users", "add", "chat"];

  views.forEach((v) => {
      var element = document.getElementById(v);
      if (v === view) {
          element.classList.remove("d-none");
      } else {
          element.classList.add("d-none");
      }
  });
}