
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
const loginUsername = document.querySelector('#loginUsername');
const registerUsername = document.querySelector('#registerUsername');


// if else because they dissapear when logged in and BRINGS UP ERROR....
if (loginToggle && signUpToggle) {
    loginToggle.addEventListener('click', () => { loginForm.classList.toggle('loginFormToggle'); loginForm.classList.toggle('loginForm'); loginUsername.focus(); })
    signUpToggle.addEventListener('click', () => { registerForm.classList.toggle('registerFormToggle'); registerForm.classList.toggle('registerForm'); registerUsername.focus(); })
}

XoutOfLogin.addEventListener('click', () => { loginForm.classList.toggle('loginFormToggle'); loginForm.classList.toggle('loginForm') })
XoutOfRegister.addEventListener('click', () => { registerForm.classList.toggle('registerFormToggle'); registerForm.classList.toggle('registerForm') })

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






///////REGISTER / LOGIN FETCH SEND TO handle_comments.php from main js fetch ////////////////////////////////////////////////////////
/// different paths from fetch in blogs and index pages

//REGISTER send post to API//
const theRegisterForm = document.getElementById('registerForm');
const submitRegistrationBtn = document.getElementById('submitRegistration');

submitRegistrationBtn.addEventListener('click', () => {


    console.log('clicked reg submit btn');
    let data = new FormData();
    data.append('submitRegistrationBtn', submitRegistrationBtn);
    data.append('username', theRegisterForm.registerUsername.value);
    data.append('email', theRegisterForm.email.value);
    data.append('password', theRegisterForm.registerPassword.value);


    fetch('./header.php', {
        method: 'POST',
        body: data
    })
    // .then(res => { console.log('the response ', res); res.json(); })
    // .then(theRes => { console.log('the res ', theRes) })
})


//LOGIN send post to API//
const submitLoginBtn = document.getElementById('submitLogin');
// already declaired..  const loginForm = document.getElementById('loginForm');

submitLoginBtn.addEventListener('click', () => {

    let data = new FormData();
    data.append('submitLoginBtn', submitLoginBtn);
    data.append('username', loginForm.loginUsername.value);
    data.append('password', loginForm.loginPassword.value);

    fetch('./header.php', {
        method: 'POST',
        body: data
    })



})


//LOGOUT////////////////////////////////////////////////

const logoutBtn = document.querySelector('.logOutBtn');

logoutBtn.addEventListener('click', () => {
    let data = new FormData();
    data.append('logoutBtn', logoutBtn);

    fetch('./header.php', {//
        method: 'POST',
        body: data
    })




})






