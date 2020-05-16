let plusButton = document.getElementById('plus');
let minusButton = document.getElementById('minus');
let liter = document.getElementById('liter');

function updateQuantity(operation){
    let qty = parseInt(liter.innerHTML);
    let unity;

    liter.innerHTML = parseInt(liter.innerHTML) + operation;

    for (let data of document.querySelectorAll('[data-qty]')) {
        let span = document.createElement('span');
        let computed = (parseInt(data.dataset.qty) * qty);

        switch (data.dataset.unit) {
            case "g":
                if (computed >= 1000) {
                    computed /= 1000;
                    unity = ' kg de ';
                } else {
                    unity = ' g de ';
                }
                break;

            case "cl":
                if (computed >= 100) {
                    computed /= 100;
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

        // Adding quantity to previously created span.
        let spanQuantity = document.createElement('span')
        spanQuantity.innerHTML = unity;

        // Adding span to its parent element.
        data.innerHTML = '';
        span.innerHTML = computed.toString();
        data.appendChild(span);
        data.appendChild(spanQuantity);
    }
}


plusButton.addEventListener("click", function() {
    updateQuantity(1);
});

minusButton.addEventListener("click", function() {
    updateQuantity(-1);
});

updateQuantity(1);