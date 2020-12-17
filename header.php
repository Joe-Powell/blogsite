<?php session_start(); ?>



<?php
////////////////////////REGISTER USER INTO DATABASE  /////////////////////////////////////
require './Database/DB_CONN.php';

if (isset($_POST['submitRegistrationBtn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($username) || empty($password)) {
        $message = "Please fill all fields";
        header("Location: index.php");
        exit();
    }

    $user_check_query = "SELECT * FROM users  WHERE
     username=? OR email=? ";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $user_check_query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);


    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows < 1) {

        // $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        // $stmt = mysqli_stmt_init($conn);
        // mysqli_stmt_prepare($stmt, $sql);
        // mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
        // mysqli_stmt_execute($stmt);

        //OOP
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",  $username, $email, $password);
        $res = $stmt->execute();

        echo "register success! ";
    } else {

        header("location: ./index.php?errorMsg=usernameEmailErr");
    }
}


//  if (isset($_GET['errorMsg'])) {




//  }




////////////////LOGIN USER ////////////////////////////////////

if (isset($_POST['submitLogin'])) {
    require './Database/DB_CONN.php';
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];


    $sql = "SELECT * FROM users WHERE username =? AND password=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",  $username, $password);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    $user =  $result->fetch_assoc();

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['uid'] = $user['id'];
        $message = "Login Sucessful";
        //echo "Login Sucessful hello user " . $_SESSION['uid'];
    } else {
        $message = "Login Failure";
        echo 'the login is not correct';
    }
}




///LOGOUT ////////
if (isset($_POST['logOutBtn'])) {
    session_unset();
    session_destroy();
    //header("Location: ./index.php?loggedout");
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/871b467013.js" crossorigin="anonymous"></script>

</head>

<body>

    <nav>
        <div class="topRow">
            <h2>Code<span>Driven</span></h2>

            <div class='burgerContainer'>
                <?php if (isset($_GET['errorMsg'])) { ?>
                    <h4 style='color:red;'><?php echo 'User Taken'; ?></h4>
                <?php  } ?>




                <?php if (!isset($_SESSION['uid'])) { ?>
                    <div class='btns'>
                        <li class='loginToggle'>Login</li>
                        <li class='signUpToggle'>Signup</li>
                    </div>
                <?php  } ?>

                <?php if (isset($_SESSION['uid'])) { ?>
                    <form class='logoutForm' method='post' action='./index.php'>
                        <button type='submit' class='logOutBtn' name='logOutBtn'> Logout</button>
                    </form>
                <?php  } ?>

                <ion-icon id='menuNav' name="menu-outline"></ion-icon>




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


        <?php if (isset($message)) { ?>
            <h4 style='color:red;'><?php echo $message ?></h4>
        <?php  } ?>
    </nav>


    <!--loginRegisterForm"> buttons in navbar header..-------------------------------------------->

    <form id='loginForm' class='loginForm ' method='post' action='./index.php'>
        <div class='formContents'>
            <h2>Login</h2>
            <input type="text" id="loginUsername" name='loginUsername' placeholder="username">
            <input type="password" id="loginPassword" name='loginPassword' placeholder="Password">
            <p class='pwordInfo'>1 capital letter minimum and at least 4 letters</p><br>

            <button type="submit" id='submitLogin' name='submitLogin'>Submit</button>
            <h3 class="loginMessage"></h3>

        </div>
        <i class="fas fa-times"></i>
    </form>




    <form class='registerForm ' id='registerForm'>

        <div class='formContents'>
            <h2>Register your new account </h2>
            <input type="text" id="registerUsername" name='registerUsername' placeholder="username">
            <input type="email" id="email" name='email' placeholder="email">
            <input type="password" id="registerPassword" name='registerPassword' placeholder="Password">
            <p class='pwordInfo'>1 capital letter minimum and at least 4 letters</p><br>
            <button type="submit" id='submitRegistration' name='submitRegistration'>Signup</button>
            <h3 class="registerMessage"></h3>
            <?php if (isset($message)) { ?>
                <h3 class='errorMsg'><?php echo $message ?></h3>
            <?php  } ?>
        </div>
        <i class="fas fa-times"></i>


    </form>


    <!-- ----------------------------------------------------------------------- -->