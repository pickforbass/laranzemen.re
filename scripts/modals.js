//First, get buttons and link them to modal windows
const buttons = document.querySelectorAll('[aria-haspopup="dialog"]');
const mainPage = document.querySelector('.page');
const crosses = document.querySelectorAll('[aria-dismiss]');


buttons.forEach((button) => {
    let window = document.getElementById(button.getAttribute('aria-controls'));
    button.addEventListener('click', ()=> {
        openWindow(window);

    })
});

//Then, get closing buttons and link them to modal windows

crosses.forEach((cross) =>{
    let window = document.getElementById(cross.getAttribute('aria-dismiss'));
    let box = window.getAttribute('aria-dismiss-box');
    if(cross.parentElement) {
        cross.parentElement.addEventListener('click', (event) => {
            let elements = document.querySelectorAll('#' + box + ' *');
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


