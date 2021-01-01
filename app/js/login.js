// Nav bar  login
var burger = document.querySelector(".login__hamburger");
var navphone = document.querySelector('.navphone');
var navlink = document.querySelectorAll('.navphone__link');


burger.addEventListener('click', function () {
    navphone.classList.toggle('navphone--active');

});