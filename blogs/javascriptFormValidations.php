<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/javascriptFormValidations.css">
<div class="containBlog">

    
<h2> Here are some key form validations with javaScript</h2>

<pre class='thePre'><code class="javascript"> 

const theRegisterForm = document.getElementById('registerForm');
const submitRegistrationBtn = document.getElementById('submitRegistration');

submitRegistrationBtn.addEventListener('click', (e) => {
    const username = registerForm.registerUsername.value;
    const password = registerForm.registerPassword.value;
    const registerMessage = document.querySelector('.registerMessage');

    const oneCap = /[A-Z]/;
    const nums = /[0-9]/;

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
    
      else if(!nums.test(password)) {
        e.preventDefault();
        registerMessage.innerHTML = 'Password must have at least one number';
        registerForm.registerPassword.focus();
       
      }
    else {
        // If pass all tests... do what you want. here I send to php API
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
</code></pre>

<p>
First put the regex in a variable, make conditionals, use the .test() method which gives back true or false.
if ! not true, then it will push a message to the form afte preventing a submission using e.peventDefault(). 


</p>

</div>











<?php include 'footerForBlogs.php'; ?>









