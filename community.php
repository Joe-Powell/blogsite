<?php include './header.php'; ?>
<link rel="stylesheet" href="./css/community.css">



<?php
    
    require './Database/DB_CONN.php';
    
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

<div class="login/register">

<form class='loginForm loginFormToggle' action='index.php' method='post'>
    <h2>Login</h2>
    <input type="text" id="username" name='username'>
    <input type="password"  id="password" name='password' placeholder="Password">
    <button type="submit" class="btn btn-primary" name='submitLogin'>Submit</button>   
 </form>




<form class='registerForm registFormToggle' action='index.php' method='post'>
        <h2 >Register your new account </h2>
        <input type="email" id= "email" name='email' placeholder="email" required>
        <input type="text" id="username" name='username' placeholder="username" required >
        <input type="password" id="password" name='password' placeholder="Password" required >
        <button type="submit"  name='submitRegistration'>Signup</button>
    </form>


</div>


<?php if(isset($_SESSION['uid'])) { ?>
<h2>Comments/questions</h2>
    <form>
        <input class='comment' type='text' name='comment'>
        <input type='hidden' name='UserIdFromSessionHidden' value='<?php echo $_SESSION['uid'] ?>'>
        <input class='submitComment' type='submit' name='submitComment' value='Submit'>
    </form>

    <?php }  ?>





    <?php
  require './Database/DB_CONN.php';
$sql = "SELECT * FROM comment_table";
$result = $conn->query($sql) ;
$comments = $result->fetch_assoc(); 
//print_r($comments);
?>

<div class='commentsContainerAll'>
<?php
 require './Database/DB_CONN.php';
 $sql = "SELECT * FROM comment_table";
 $result = $conn->query($sql) ;
 $comments = $result->fetch_assoc(); 

while($comments = $result->fetch_assoc() ) { ?>
<div class='commentContainer'>
    <p><?php echo $comments['id']; ?></p>
    <p><?php echo $comments['comment']; ?></p>
    <?php if(isset($_SESSION['uid']) && $_SESSION['uid'] == $post->inputId) { ?>
        <h4 class='editCommBtn'>Edit</h4>
    <?php }  ?>
    <form id='commEditForm' class='toggleForm'> 
        <i class="far fa-times-circle"></i>
        <input class='update' name='update' type='text' value='<?php echo $comments['comment']; ?>'> 
        <input type='submit' value='Update'>
    </form> 
</div>   
<?php } ?>

</div>




<script src='communityJavascript.js' ></script>
<?php include 'footer.php'; ?>