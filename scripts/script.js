const plusButton = document.getElementById('plus');
const minusButton = document.getElementById('minus');
const liter = document.getElementById('liter');

function updateQuantity(operation){
    let qty = parseInt(liter.innerHTML) + operation;
    let unity;

    liter.innerHTML = qty;

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
                unity = ' ' + data.dataset.unit + " de ";
                break;

            default :
                unity = ' ';
                break;
        }

        // Adding unity to a newer created span.
        let spanUnity = document.createElement('span')
        spanUnity.innerHTML = unity;

        // Adding span to its parent element.
        data.innerHTML = '';
        span.innerHTML = computed.toString();
        data.appendChild(span);
        data.appendChild(spanUnity);
    }
}


plusButton.addEventListener("click", function() {
    updateQuantity(1);
});

minusButton.addEventListener("click", function() {
    let newliter = liter.innerHTML;
    if(parseInt(newliter) >= 1) {
        updateQuantity(-1);
    }
})


updateQuantity(0);