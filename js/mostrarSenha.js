let olho = document.querySelector('#olho');
var p = document.querySelector('[type = "password"]');

function show() {
   
    p.setAttribute('type', 'text');
    olho.setAttribute('src','../assets/svg/pass2.svg')
}

function hide() {
    p.setAttribute('type', 'password');
    olho.setAttribute('src','../assets/svg/pass1.svg')
}

var pwShown = 0;

document.getElementById("eye").addEventListener("click", function() {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);
