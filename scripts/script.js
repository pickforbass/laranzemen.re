
let plusbutton = document.getElementById('plus');
let minusbutton = document.getElementById('minus');
let liter = document.getElementById('liter');


function UpdateLiter(cont){
    liter.innerHTML= parseInt(cont);
    console.log(result);
}

function add (){
    result = parseInt(liter.innerHTML) + 1;
    UpdateLiter(result);
}

function less (){
    if (parseInt(liter.innerHTML) > 1){
        result = parseInt(liter.innerHTML) - 1;
        UpdateLiter(result);
    }
}

plusbutton.addEventListener("click", add());
minusbutton.addEventListener("click", less());
UpdateLiter("1");

