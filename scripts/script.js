let plusButton = document.getElementById('plus');
let minusButton = document.getElementById('minus');
let liter = document.getElementById('liter');


//Event Listeners functions
function add(){
    liter.innerHTML = parseInt(liter.innerHTML) + 1;
    updateQty();

}

function less(){
    if (parseInt(liter.innerHTML) > 1){
        liter.innerHTML = parseInt(liter.innerHTML) - 1;
        updateQty();

    }
}

// Update quantities
function updateQty()
{
    for (let data of document.querySelectorAll('[data-qty]')) {
        let qty = parseInt(data.dataset.qty)*parseInt(liter.innerHTML);
        data.innerHTML = qty;
    }

}

plusButton.addEventListener("click", add);
minusButton.addEventListener("click", less);
updateQty();
