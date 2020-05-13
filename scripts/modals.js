//Frist, get buttons and link them to modal windows
let buttons = document.querySelectorAll('[aria-haspopup="dialog"]');
const mainPage = document.querySelector('.page');

if (mainPage) {
    console.log("ok");
} else {
    console.log('pas ok');
}

buttons.forEach((button) => {
    let window = document.getElementById(button.getAttribute('aria-controls'));
    button.addEventListener('click', ()=> {
        openWindow(window);

    })
});


//Then, get close buttons and link them to modal windonws

const crosses = document.querySelectorAll('[aria-dismiss]');

crosses.forEach((cross) =>{
    let window = document.getElementById(cross.getAttribute('aria-dismiss'));
    console.log(cross.getAttribute('aria-dismiss'))
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


