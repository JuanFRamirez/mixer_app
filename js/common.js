const menuButton = document.querySelector(".toggle-menu");
const menu = document.querySelector(".sidebar");
const searchDrink = document.querySelector(".search-drink");
const closeContent = document.querySelector(".close-content");
const content = document.querySelector(".content");
const modifyDrinkForm = document.querySelector(".modify");
const modDrink = document.querySelector(".mod-drink");

/*
add drinks

*/

const closeAddDrink = document.querySelector(".close-add-drink");
const insert = document.querySelector(".insert");
const menuAddDrink = document.querySelector(".menu-add-drink");
const buttonAddDrink = document.querySelector(".add-drink");

///

const menuSearch = document.querySelector(".menu-search");

window.addEventListener("DOMContentLoaded", function () {
  function slider() {
    let i = 0;
    setInterval(() => {
      let imagesClass = ["beach", "classy", "beer", "lime", "bottles"];
      let counter = imagesClass.length;
      let body = document.querySelector("body");
      if (i >= counter) {
        i = 0;
      }
      body.className = "main" + " " + imagesClass[i];
      i++;
    }, 15000);
  }
  slider();

  setTimeout(() => {
    let Head = document.querySelector(".main-title");
    Head.classList.add("reveal");
  }, 1000);
});

menuButton.addEventListener("click", function (e) {
  if (menu.classList.contains("sidebar-hided")) {
    menu.classList.remove("sidebar-hided");
  } else {
    menu.classList.add("sidebar-hided");
  }
});

// send to search

//activate search

menuSearch.addEventListener("click", function () {
  if (!content.classList.contains("flex")) {
    content.classList.add("flex");
  }
});

closeContent.addEventListener("click", function () {
  document.querySelector(".search-box-input").value = "";
  let columnResult = document.querySelector(".column-two");
  columnResult.innerHTML = "";
  content.classList.remove("flex");
});

//add drink controls

menuAddDrink.addEventListener("click", function () {
  if (!insert.classList.contains("flex")) {
    insert.classList.add("flex");
  }
});

closeAddDrink.addEventListener("click", function () {
  insert.classList.remove("flex");
});

const closeUpdateDrink = document.querySelector(".close-update-drink");
closeUpdateDrink.addEventListener("click", (e) => {
  if (modifyDrinkForm.classList.contains("flex")) {
    document.querySelector(".column-two-update").innerHTML = "";
    modifyDrinkForm.classList.remove("flex");
  }
});

