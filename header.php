<?php session_start(); ?>



<?php
////////////////////////REGISTER USER INTO DATABASE  /////////////////////////////////////
require './Database/DB_CONN.php';

if(isset($_POST['submitRegistrationBtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($username) || empty($password)) {
        $message = "Please fill all fields";
        header("Location: index.php");
        exit();
    }

    $user_check_query = "SELECT * FROM users  WHERE
     username='$username' OR email='$email' ";
    $result = $conn->query($user_check_query);

    if($result->num_rows < 1) {
    $sql= "INSERT INTO users (username, email, password)
     VALUES ('$username', '$email','$password')";
    $result = $conn->query($sql);
    header("Location: community.php");
    echo "register success! ";
    }else{
       
        $message = "user taken please try again";
        echo "register Failure ";
    }
}




////////////////LOGIN USER ////////////////////////////////////

if (isset($_POST['submitLoginBtn'])) {
    require './Database/DB_CONN.php';
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql="SELECT * FROM users WHERE username ='$username' AND password='$password' ";
    $result = $conn->query($sql);
    $user =  $result->fetch_assoc();

    if(mysqli_num_rows($result) === 1) {
        $_SESSION['uid'] = $user['id'];
        $message = "Login Sucessful";
        echo "Login Sucessful hello user " .$_SESSION['uid'];
    }else{
        $message = "Login Failure";
        echo 'the login is not correct';
    }

}


///LOGOUT ////////
if(isset($_POST['logoutBtn'])) {
    session_unset();
    session_destroy();
    header('Location: ./index.php');




}







?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeDriven</title>
    <link rel="icon" href="images/webDev.jpg" />
    <link rel="stylesheet" href="./css/styleNav.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/871b467013.js" crossorigin="anonymous"></script>
    
</head>

<body>

    <nav>
        <div class="topRow">
            <h2>Code<span>Driven</span></h2>

            <div class= 'burgerContainer'>
              

                <?php if(!isset($_SESSION['uid'])){ ?>
                    <div class='btns'>
                        <li class='loginToggle'>Login</li>
                        <li class='signUpToggle'>Signup</li>
                    </div>  
                <?php  } ?>
                
                <ion-icon id='menuNav' name="menu-outline"></ion-icon>

                <?php if(isset($_SESSION['uid'])){ ?>
                <form class='logoutForm'>
                    <button type='submit' class='logOutBtn'> Logout</button>
                </form>
            <?php  } ?>

                
            </div>

        </div>

        <ul id="navUl">
            <div class="navLinks">
                <a href='index.php'>
                    <li>Home</li>
                </a>
                <a href="about.php">
                    <li>About</li>
                </a>
                <a href="community.php">
                    <li>Community</li>
                </a>
            </div>
          
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