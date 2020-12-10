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

    $('#menuNav').on('click', () => {
        $('#nav').slideToggle(1000);
    });

});



//////////////////////////////////////////////////////////////////////////////////////////////////////////////







////////LOGIN/REGISTER  look in index.php, header.php, ///////////////////////////////////////////////////////////////

const loginToggle = document.querySelector('.loginToggle');
const signUpToggle = document.querySelector('.signUpToggle');

const loginForm = document.querySelector('.loginForm');
const registerForm = document.querySelector('.registerForm');
const XoutOfLogin = document.querySelector('.loginForm .fa-times');
const XoutOfRegister = document.querySelector('.registerForm .fa-times');

loginToggle.addEventListener('click', () => { loginForm.classList.toggle('loginFormToggle'); loginForm.classList.toggle('loginForm') })
signUpToggle.addEventListener('click', () => { registerForm.classList.toggle('registerFormToggle'); registerForm.classList.toggle('registerForm') })


XoutOfLogin.addEventListener('click', () => { loginForm.classList.toggle('loginFormToggle'); loginForm.classList.toggle('loginForm') })
XoutOfRegister.addEventListener('click', () => { registerForm.classList.toggle('registerFormToggle'); registerForm.classList.toggle('registerForm') })

