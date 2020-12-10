<?php include 'header.php'; ?>
<link rel="stylesheet" href="./css/index.css">


<!--loginRegisterForm"> buttons in navbar header..-------------------------------------------->

<form class='loginForm ' action='index.php' method='post'>
  <div class='formContents'>
    <h2>Login</h2> 
    <input type="text" id="username" name='username' placeholder="username">
    <input type="password"  id="password" name='password' placeholder="Password">
    <button type="submit" class="btn btn-primary" name='submitLogin'>Submit</button>   
  </div>
  <i class="fas fa-times"></i>
</form>




<form class='registerForm ' action='index.php' method='post'>

  <div class='formContents'>
      <h2 >Register your new account </h2>
      <input type="email" id= "email" name='email' placeholder="email" required>
      <input type="text" id="username" name='username' placeholder="username" required >
      <input type="password" id="password" name='password' placeholder="Password" required >
      <button type="submit"  name='submitRegistration'>Signup</button>
  </div>
  <i class="fas fa-times"></i>
    </form>


<!-- ----------------------------------------------------------------------- -->



<div class="topImage"></div>


<div class="containBlogs">

  <div class="parent">
    <h1>C.R.U.D. Application made with Php, social media site.</h1>
    <h2> </h2>
    <div class="overlay">
      <h4> This is a CRUD app I made using Php. You can register an account, <span>log in, leave a post, upload photos,</span> and more.
        
      </h4>
      <a href='./blogs/crudBlog.php'> Read more</a>
    </div>


  </div>


  <div class="parent">
    <h1><i class="fab fa-react"></i> Redux for React.js </h1>
    <h2></h2>
    <div class="overlay">
      <h4>
      In this blog I will 
      talk about the concepts and steps used to break down redux.
       
      </h4>
      <a href='./blogs/reactAndRedux.php' > Read more</a>
    </div>
</div>

  <div class="parent">
    <h1> Connect To Mongodb</h1>
    <h2></h2>
    <div class="overlay">
      <h4> This is on the basic steps of connecting mongdb 
         to your node/express projects. This is for concepts only in order to break it 
         down to it's simplist form.
    
      </h4>
      <a href='./blogs/connectToMongodb.php' > Read more</a>
    </div>
    
</div>


  <div class="parent">
    <h1><i class="fab fa-react"></i> Host a React.js project</h1>
    <h2></h2>
    <div class="overlay">
      <h4>Learn how to host your react.js project in your shared hosting account.
        
      </h4>
      <a href='./blogs/hostYourReactProject.php'> Read more</a>
    </div>

    
  </div>


  <div class="parent">
    <h1><i class="fab fa-php"></i> PHP Login Registration system</h1>
    <h2></h2>
    <div class="overlay">
      <h4>Learn how build a PHP login/Registration system from scratch step by step. 
        Just the basics without much security measures or form validation much 
        so you can focus on the fundamentals first.
        
      </h4>
      <a href='./blogs/phpLogin.php'> Read more</a>
    </div>

    
  </div>


  <div class="parent">
    <h1>Visual studio Shortcuts</h1>
    <h2></h2>
    <div class="overlay">
      <h4>
        Here are some of my favorite shortcuts when using Visual Studio help you speed things up.
      </h4>
      <a href='./blogs/visualStudioShortcuts.php'> Read more </a>
    </div>

    
  </div>


</div>

<?php include 'footer.php'; ?>