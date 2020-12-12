<?php
    
    require '../Database/DB_CONN.php';
    
    if(isset($_POST['comment'])) {
        $comment = $_POST['comment'];

        // print_r($_POST['comment']);
         print_r($_POST);
        print_r($comment);
        
        

         $sql= "INSERT INTO comment_table (comment) VALUES ('$comment')";
         $result = $conn->query($sql);


         $sql = "SELECT * FROM comment_table";
         $result = $conn->query($sql) ;
         $comments = $result->fetch_assoc(); 
         while($comments = $result->fetch_assoc() ) {
            echo $comments['id']; 
            echo $comments['comment'];

         }

    }     


?>



<?php
////////////////////////REGISTER USER INTO DATABASE  /////////////////////////////////////
require '../Database/DB_CONN.php';

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
    }else{
        header("Location: index.php");
        exit(); 
    }
}




////////////////LOGIN USER ////////////////////////////////////

if (isset($_POST['submitLoginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql="SELECT * FROM users WHERE username ='$username' AND password='$password' ";
    $result = $conn->query($sql);
    $user =  $result->fetch_assoc();

    if(mysqli_num_rows($result) === 1) {
        $_SESSION['uid'] = $user['id'];
    }



}





?>









