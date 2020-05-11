let minusButton = document.getElementById("minus");
let plusButton = document.getElementById("plus");
let factor = document.getElementById('liter');


minusButton.addEventListener('click', function() {
    if(parseInt(factor.innerHTML) > 1) {
        factor.innerHTML = parseInt(factor.innerHTML) - 1;
        updateQty();
    }
});

plusButton.addEventListener('click', function() {
    factor.innerHTML = parseInt(factor.innerHTML) + 1;
    updateQty();
});


/**
 * Upgrade recipe quantities.
 */
function updateQty()
{
    for(let element of document.querySelectorAll('[data-quantity]')) {
        let value = parseInt(factor.innerHTML) * parseInt(element.dataset.quantity);

        let result = document.createElement('span');

        if(element.dataset.unity === 'cl') {
            result.innerHTML = value + ' ' + element.dataset.unity;
        }
        else if(element.dataset.unity === 'gr') {
            // TODO
        }

        element.innerHtml = '';
        element.appendChild(result);
    }
}