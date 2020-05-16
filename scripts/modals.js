//First, get buttons and link them to modal windows
let buttons = document.querySelectorAll('[aria-haspopup="dialog"]');
const mainPage = document.querySelector('.page');

console.log(buttons);
buttons.forEach((button) => {
    let window = document.getElementById(button.getAttribute('aria-controls'));
    button.addEventListener('click', ()=> {
        console.log('ok');
        openWindow(window);

    })
});

document.getElementById('add-recipe-btn').addEventListener('click', function () {
    console.log('ok');
});

//Then, get closing buttons and link them to modal windows

const crosses = document.querySelectorAll('[aria-dismiss]');

crosses.forEach((cross) =>{
    let window = document.getElementById(cross.getAttribute('aria-dismiss'));
    if(cross.parentElement) {
        cross.parentElement.addEventListener('click', (event) => {
            let elements = document.querySelectorAll('#add-recipe-box *');
            if(!Array.prototype.slice.call(elements).includes(event.target)) {
                closeWindow(window);
            }
        })
    }
    cross.addEventListener("click", ()=> {
        closeWindow(window);

    })
});

function openWindow(elem){
    elem.setAttribute('aria-hidden', 'false');
    mainPage.setAttribute('aria-hidden', 'true');

}

function closeWindow(elem){
    elem.setAttribute('aria-hidden', 'true');
    mainPage.setAttribute('aria-hidden','false');
}


