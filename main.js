
/////Jquery fro slide menu.....//////////////////////////////
$(document).ready(() => {

    $('#menuNav').on('click', () => {
        $('#nav').slideToggle(1000);
    });

});



//////////////////////////////////////////////////////////////////////////////////////////////////////////////







////////LOGIN/REGISTER buttons  header.php, ///////////////////////////////////////////////////////////////

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

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






///////REGISTER LOGIN FETCH SEND TO handle_comments.php from main js fetch ////////////////////////////////////////////////////////
/// different paths from fetch in blogs and index pages
const theRegisterForm = document.getElementById('registerForm');
const submitRegistrationBtn = document.getElementById('submitRegistration');

submitRegistrationBtn.addEventListener('click', (e) => {
    e.preventDefault();

    console.log('clicked reg submit btn');
    let data = new FormData();
    data.append('submitRegistrationBtn', submitRegistrationBtn);
    data.append('username', theRegisterForm.registerUsername.value);
    data.append('email', theRegisterForm.email.value);
    data.append('password', theRegisterForm.registerPassword.value);


    fetch('./blogs/handle_comments.php', {
        method: 'POST',
        body: data
    })
    // .then(res => { console.log('the response ', res); res.json(); })
    // .then(theRes => { console.log('the res ', theRes) })



})