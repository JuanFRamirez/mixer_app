searchDrink.addEventListener("click", (e) => {
  let drinkName = document.querySelector('input[name="drink"]');
  let drinkTag = document.querySelector('select[name="tag"]');
  e.preventDefault();

  let obj = {
    drink: drinkName.value,
    tag: drinkTag.value,
    opc: "get_drink",
  };
    console.log(getData("./execute.php", obj));
});
