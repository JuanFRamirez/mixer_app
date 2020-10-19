const menuButton = document.querySelector('.toggle-menu');
const menu = document.querySelector('.sidebar');
const searchDrink =  document.querySelector('.search-drink');
const closeContent =  document.querySelector('.close-content');
const content = document.querySelector('.content');
const modifyDrinkForm =  document.querySelector('.modify');
const modDrink = document.querySelector('.mod-drink');



/*
add drinks

*/

const closeAddDrink = document.querySelector('.close-add-drink');
const insert = document.querySelector('.insert');
const menuAddDrink = document.querySelector('.menu-add-drink');
const buttonAddDrink =  document.querySelector('.add-drink');

///

const menuSearch =  document.querySelector('.menu-search');

window.addEventListener('DOMContentLoaded',function(){

    function slider(){
        let i = 0;
        setInterval(()=>{
            let imagesClass = ['beach','classy','beer','lime','bottles'];
        let counter = imagesClass.length;
        let body = document.querySelector('body');
            if(i>=counter){
                i=0
            }
            body.className='main'+' '+ imagesClass[i];
            i++;
        },15000);
        
    }
    slider();


    setTimeout(()=>{
        let Head = document.querySelector('.main-title');
        Head.classList.add('reveal');
    },1000)
})

function setGetRefresh(link,responseItem,objeto){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector(responseItem).innerHTML = this.responseText
      }
    };
    xhttp.open("POST", link, true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(objeto));
}


menuButton.addEventListener('click',function(e){
    
    if(menu.classList.contains('sidebar-hided')){
        menu.classList.remove('sidebar-hided');
    }else{
        menu.classList.add('sidebar-hided');
    }
});

// send to search
searchDrink.addEventListener('click',(e)=>{
let drinkName = document.querySelector('input[name="drink"]');
let drinkTag = document.querySelector('select[name="tag"]');
e.preventDefault();

let obj={
    drink:drinkName.value,
    tag:drinkTag.value,
    opc:'get_drink'
}
setGetRefresh('./execute.php','.column-two',obj);


});

buttonAddDrink.addEventListener('click',function(e){
e.preventDefault();
let drinkName = document.querySelector('.insert input[name="drink"]');
let drinkBase = document.querySelector('.insert input[name="base"]');
let drinkIngredients = document.querySelector('.insert textarea[name="ingredients"]');
let drinkPreparation = document.querySelector('.insert textarea[name="preparation"]');
let drinkGlass = document.querySelector('.insert input[name="glass"]');
let drinkServing = document.querySelector('.insert select[name="serve"]');
let drinkTag = document.querySelector('.insert select[name="tag"]');

let obj={
    drink:drinkName.value,
    base:drinkBase.value,
    ingredients:drinkIngredients.value,
    preparation:drinkPreparation.value,
    glass:drinkGlass.value,
    serve:drinkServing.value,
    tag:drinkTag.value,
    opc:'add_this_drink'
}
setGetRefresh('./execute.php','.column-two-add',obj);

});

//activate search

menuSearch.addEventListener('click',function(){

    if(!content.classList.contains('flex')){
        content.classList.add('flex');
    }

});

closeContent.addEventListener('click',function(){
    document.querySelector('.search-box-input').value='';
    let columnResult = document.querySelector('.column-two'); 
    columnResult.innerHTML = '';
    content.classList.remove('flex');
    
    

});

//add drink controls

menuAddDrink.addEventListener('click',function(){
    if(!insert.classList.contains('flex')){
        insert.classList.add('flex');
    }
});

closeAddDrink.addEventListener('click',function(){
    insert.classList.remove('flex');
});

//Delete drink

const deleteFunction=(e)=>{
    // pass event target from inline to here
    e=e||window.event;
    let target = e.target || e.srcElement;
    let dataID = parseInt(target.dataset.id);

    //create obj
    console.log(dataID);
    let obj = {
        id:dataID,
        opc:'delete_drink'
    }

    setGetRefresh('./execute.php','.delete-result',obj);
    target.style.opacity = 0.5;
    target.disabled = true;
    setTimeout(()=>{
        window.location.reload();
    },2000)

}

//Modify Drink

const modifyDrink = (e)=>{
    e=e||window.event;
    let target = e.target || e.srcElement;
    e.preventDefault();
    let components = e.target.parentElement;
    let name = components.querySelector('.result-text[data-name]').innerText;
    let base = components.querySelector('.result-text[data-base]').innerText;
    let ingredients = components.querySelector('.result-text[data-ingredients]').innerText;
    let preparation = components.querySelector('.result-text[data-preparation]').innerText;
    let glass = components.querySelector('.result-text[data-glass]').innerText;
    let serve = components.querySelector('.result-text[data-serve]').innerText;
    let tag = components.querySelector('.result-text[data-tag]').innerText;
    let id = e.target.dataset.id;

    modifyDrinkForm.setAttribute('data-id',id)
    modifyDrinkForm.classList.add('flex');
    modifyDrinkForm.querySelector('input[name="drink"]').value = name;
    modifyDrinkForm.querySelector('input[name="base"]').value = base;

    modifyDrinkForm.querySelector('textarea[name="ingredients"]').innerText = ingredients;
    modifyDrinkForm.querySelector('textarea[name="ingredients"]').value = ingredients;

    modifyDrinkForm.querySelector('textarea[name="preparation"]').innerText = preparation;
    modifyDrinkForm.querySelector('textarea[name="preparation"]').value = preparation;

    modifyDrinkForm.querySelector('input[name="glass"]').value = glass;
    modifyDrinkForm.querySelector('select[name="serve"]').value = serve;
    modifyDrinkForm.querySelector('select[name="tag"]').value = tag;

    
}

    modDrink.addEventListener('click',(e)=>{
        e.preventDefault();
        console.log(0);
        let obj = {
            id:parseInt(modifyDrinkForm.attributes[1].value),
            drink:modifyDrinkForm.querySelector('input[name="drink"]').value,
            base:modifyDrinkForm.querySelector('input[name="base"]').value,
            ingredients: modifyDrinkForm.querySelector('textarea[name="ingredients"]').value,
            preparation:modifyDrinkForm.querySelector('textarea[name="preparation"]').value,
            glass: modifyDrinkForm.querySelector('input[name="glass"]').value,
            serve: modifyDrinkForm.querySelector('select[name="serve"]').value,
            tag:modifyDrinkForm.querySelector('select[name="tag"]').value,
            opc:'modify_this_drink'

        }

        setGetRefresh('./execute.php','.column-two-update',obj);
    })

    const closeUpdateDrink = document.querySelector('.close-update-drink');
    closeUpdateDrink.addEventListener('click',(e)=>{
        if(modifyDrinkForm.classList.contains('flex')){
            document.querySelector('.column-two-update').innerHTML = '';
            modifyDrinkForm.classList.remove('flex');
        }
    })


