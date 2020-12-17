
/////Jquery fro slide menu.....//////////////////////////////
$(document).ready(() => {

    $('#menuNav').on('click', () => {
        $('#navUl').slideToggle(1000);
    });

});



//////////////////////////////////////////////////////////////////////////////////////////////////////////////







////////LOGIN/REGISTER buttons for modal and  some declarations  header.php, ///////////////////////////////////////////////////////////////

const loginToggle = document.querySelector('.loginToggle');
const signUpToggle = document.querySelector('.signUpToggle');

const loginForm = document.querySelector('.loginForm');
const registerForm = document.querySelector('.registerForm');
const XoutOfLogin = document.querySelector('.loginForm .fa-times');
const XoutOfRegister = document.querySelector('.registerForm .fa-times');
const loginUsername = document.querySelector('#loginUsername');
const registerUsername = document.querySelector('#registerUsername');
const loginMessage = document.querySelector('.loginMessage');
const registerMessage = document.querySelector('.registerMessage');


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
const errorMsg = document.querySelector('.errorMsg');
submitRegistrationBtn.addEventListener('click', (e) => {
    const username = registerForm.registerUsername.value;
    const password = registerForm.registerPassword.value;
    const oneCap = /[A-Z]/;

    if (username == '' || password == '') {
        e.preventDefault();
        registerMessage.innerHTML = 'please fill all fields';
    } else if (password.length < 4) {
        e.preventDefault();
        registerMessage.innerHTML = 'Please use at least 4 letters or more in Password';
    }
    else if (!oneCap.test(password)) {
        e.preventDefault();
        registerMessage.innerHTML = 'Password must have at least one capital letter';
    }

    else {

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


    }
})


//LOGIN send post to API//
const submitLoginBtn = document.getElementById('submitLogin');
// already declaired..  const loginForm = document.getElementById('loginForm');


if (submitLoginBtn) {
    submitLoginBtn.addEventListener('click', (e) => {
        const username = loginForm.loginUsername.value;
        const password = loginForm.loginPassword.value;
        const oneCap = /[A-Z]/;

        if (username == '' || password == '') {
            e.preventDefault();
            loginMessage.innerHTML = 'please fill all fields';
        } else if (password.length < 4) {
            e.preventDefault();
            loginMessage.innerHTML = 'Please use at least 4 letters or more in Password';
        }
        else if (!oneCap.test(password)) {
            e.preventDefault();
            loginMessage.innerHTML = 'Password must have at least one capital letter';
        } else {
            let data = new FormData();
            data.append('submitLoginBtn', submitLoginBtn);
            data.append('username', loginForm.loginUsername.value);
            data.append('password', loginForm.loginPassword.value);

            // fetch('./header.php', {
            //     method: 'POST',
            //     body: data
            // })

        }

    })

}


//LOGOUT////////////////////////////////////////////////

// const logoutBtn = document.querySelector('.logOutBtn');
// if (logoutBtn) {
//     logoutBtn.addEventListener('click', () => {
//         let data = new FormData();
//         data.append('logOutBtn', logoutBtn);

//         fetch('./header.php', {
//             method: 'POST',
//             body: data
//         })




//     })

// }




