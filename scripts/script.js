let plusButton = document.getElementById('plus');
let minusButton = document.getElementById('minus');
let liter = document.getElementById('liter');


//Event Listeners functions
function add(){
    liter.innerHTML = parseInt(liter.innerHTML) + 1;
    clear();
    updateQuantity();

}

function less(){
    if (parseInt(liter.innerHTML) > 1){
        liter.innerHTML = parseInt(liter.innerHTML) - 1;
        updateQuantity();

    }
}


// Update All
function updateAll() {
    let qty = updateQuantity()
    //let measure = updateMeasure(qty);
}

function updateQuantity(){
    var qty;
    var unity;

    for (let data of document.querySelectorAll('[data-qty]')) {
        qty = parseInt(data.dataset.qty)*parseInt(liter.innerHTML);
        let span = document.createElement('span');
        span.innerHTML = qty;
        data.appendChild(span);
    }

    for (let data of document.querySelectorAll('[data-unit]')) {
        switch (data.dataset.unit) {

            case "g":
                if (qty >= 1000) {
                    qty = parseInt(qty)/1000;
                    unity = ' kg de ';
                } else {
                    unity = ' g de ';
                }
                break;

            case "cl":
                if (qty >= 100) {
                    qty = parseInt(qty)/100;
                    unity = ' l de ';
                } else {
                    unity = ' cl de ';
                }
                break;

            case "cc":
            case "cs":
                unity = data.dataset.unit;
                break;

            default :
                unity = '';
                break;

        }
        let span = document.createElement('span');
        span.innerHTML = unity;
        data.appendChild(span);
    }
}


plusButton.addEventListener("click", add);
minusButton.addEventListener("click", less);
updateQuantity();



    for (let data of document.querySelectorAll('[data-name]')) {
        let space = data.innerHTML.length;
        console.log (space);
    }