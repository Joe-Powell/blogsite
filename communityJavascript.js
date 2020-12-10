//  Handle Community form   /////////////////////////////////////////////////////////////////////////////////

const submitComment = document.querySelector('.submitComment');
const comment = document.querySelector('.comment');
const form = document.querySelector('form');
const commentContainer = document.querySelector('.commentContainer');
const commentsContainerAll = document.querySelector('.commentsContainerAll');


submitComment.addEventListener('click', (e) => {
    // because we are sending to php, we do these next 2 lines below, easy

    let data = new FormData();
    data.append('comment', form.comment.value);

    //e.preventDefault();
    //commentsContainerAll.innerHTML += form.comment.value + "<br>";  // until refresh happens...
    fetch('./community.php', {
        method: 'POST',
        body: data
    })
        .then(res => { console.log('the response ', res); res.json(); })
        .then(theRes => { console.log('the res ', theRes) })

})


const editCommBtn = document.querySelectorAll('.editCommBtn');
const commEditForm = document.querySelectorAll('#commEditForm')
const exitIcon = document.querySelectorAll('.fa-times-circle')
for (let i = 0; i < editCommBtn.length; i++) {
    editCommBtn[i].addEventListener('click', () => {
        commEditForm[i].classList.toggle('toggleForm');
    })

    exitIcon[i].addEventListener('click', () => {
        commEditForm[i].classList.toggle('toggleForm');
    })
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////








////////LOGIN/REGISTER  look in index.php, header.php, ////////////////////

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