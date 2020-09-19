const menuNav = document.getElementById('menuNav');

//menuNav.addEventListener('click', () => {
//document.getElementById('nav').style.display = 'flex';
//if (document.getElementById('nav').style.opacity == 1) {
// document.getElementById('nav').style.opacity = 0;
//} else {
//document.getElementById('nav').style.opacity = 1;
///}




//   })




$(document).ready(() => {

    $('#menuNav, h2').on('click', () => {
        $('#nav').slideToggle(1000);
    });










});