// Ouvre le menu burger en responsive au clic
var btn = document.querySelector('.toggle_btn');
var nav = document.querySelector('.nav');

btn.onClick = function() {
    nav.classList.toggle('nav_open');
}