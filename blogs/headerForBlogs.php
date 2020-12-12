<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeDriven</title>
    <link rel="stylesheet" href="../css/styleNav.css">
    <script src="https://kit.fontawesome.com/871b467013.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>

    <!-- this link you change the href from cdnjs.com make sure it has css at end.. they start after the .js-->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.4.1/styles/vs2015.min.css">



</head>

<body>
    <nav>
    <div class="topRow">
            <h2>Code<span>Driven</span></h2>
            <div>
                <ion-icon id='menuNav' name="menu-outline"></ion-icon>

                <?php if(isset($_SESSION['uid'])){ ?>
                    <form class='logoutForm'>
                        <button type='submit' class='logOutBtn'> Logout</button>
                    </form>
                <?php  } ?>
            </div>
        </div>
        <ul id="nav">
            <a href='../index.php'>
                <li>Home</li>
            </a>
            <a href="../about.php">
                <li>About</li>
            </a>
            <a href="../community.php">
                <li>Community</li>
            </a>
         
        <?php if(!isset($_SESSION['uid'])){ ?>
                <div class='btns'>
                    <li class='loginToggle'>Login</li>
                    <li class='signUpToggle'>Signup</li>
                </div>  
                <?php  } ?>
        </ul>
       

        <?php if(isset($message)){ ?>
            <h4 style='color:red;'><?php echo $message ?></h4>
        <?php  } ?>
    </nav>


    <!--loginRegisterForm"> buttons in navbar header..-------------------------------------------->

<form id='loginForm' class='loginForm ' >
  <div class='formContents'>
    <h2>Login</h2> 
    <input type="text" id="loginUsername" name='loginUsername' placeholder="username">
    <input type="password"  id="loginPassword" name='loginPassword' placeholder="Password">
    <button type="submit" id='submitLogin'  name='submitLogin'>Submit</button> 
    
  </div>
  <i class="fas fa-times"></i>
</form>




<form class='registerForm ' id='registerForm'>

  <div class='formContents'>
      <h2 >Register your new account </h2>
      <input type="text" id="registerUsername" name='registerUsername' placeholder="username" required >
      <input type="email" id= "email" name='email' placeholder="email" required>
      <input type="password" id="registerPassword" name='registerPassword' placeholder="Password" required >
      <button type="submit" id='submitRegistration'  name='submitRegistration'>Signup</button>
  </div>
  <i class="fas fa-times"></i>
    </form>


<!-- ----------------------------------------------------------------------- -->