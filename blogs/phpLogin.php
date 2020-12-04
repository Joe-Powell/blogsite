<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/phpLogin.css">


<div class="image" alt='#'></div>

<div class="containBlog">
    
     

        <h4>1 Create a database </h4><br>
        <img src='../images\databasephp.PNG'  width="300px" alt='Some Text' />


     
        
        
        

      <p>
        in the url type in localhost/phpmyadmin. from there create a database, a table named users, the columns
        such as id, username, email, password. this will catch the fields from registration

      </p><br>

     
        <h4>2 connect to the server </h4><br>
        <!-- <img src='../images\mysqliCrudentials.PNG'  width="350px" alt='Some Text' /><br>  -->


<pre class='thePre'>
    <code class="html">   
&lt;?php
    $servername = "localhost";
    $username = "root";
    $password = "123123";
    $db = 'php_login_DB';
    $conn = new mysqli($servername, $username, $password, $db);
?>

    </code>
</pre>




      <p>
        Create a folder and file to store your database crudentials. With mysqli your going to need to 
        enter the host, user, password, and database name. 

      </p><br><br>

     
        <h4>3 Create registration form with attributes to submit </h4>
            <!--  highlight.js  links are in header to change the theme in link  -->
<pre class='thePre'>
    <code class="html">   <!-- for highlight use class to specify which languange in the class here-->
       
    &lt;form class='registerForm' action='index.php' method='post'>
        &lt;h2 >Register&lt;/h2>
        &lt;input type="email" id= "email" name='email' >
        &lt;input type="text" id="username" name='username' placeholder="username" >
        &lt;input type="password" id="password" name='password' placeholder="Password" >
        &lt;button type="submit"  name='submitRegistration'>Submit&lt;/button>
    &lt;/form>
    
    </code>
</pre>
      <p>
        make sure there is a method and an action of post. 
        make sure the elements you want to grab have the name attributes 
        so you can get them in php after you submit the form.

      </p><br>

     
        <h4>4 handle submission of registration form with php </h4><br>
        <!-- <img src='../images\ifissetsubmitregister.PNG'  width="350px" alt='Some Text' /><br>  -->

        <pre class='thePre'>
        <code class="php">   <!-- for highlight use class to specify which languange in the class here-->
    
    &lt;?php  session_start();

    
    if(isset($_POST['submitRegistration'])) {
        require './conn/db.php';
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];


    if(empty($email) || empty($username) || empty($password)) {
        $message = "Please fill all fields";
        header("Location: index.php");
        exit();
    }
    
    // check if email or username exists in database already..
    $user_check_query = "SELECT * FROM users  WHERE
     username='$username' OR email='$email' ";
    $result = $conn->query($user_check_query);
    $user = mysqli_fetch_assoc($result);

    if($result->num_rows > 0) {
        $message = 'email or username already exists';
    }else{
        $sql = "INSERT INTO users (email, username, password)
         VALUES('$email', '$username', '$password')";
        $result = $conn->query($sql);


        }

    }
       
       </code>
   </pre>


         <p>
            Since we are submitting the form to index.php in here, we will handle the submission
            by first opening some php tags on top of the page above the DOCTYPE html declaration
             in index.php and make an if else statement. Inside the condition we want to check
            for a click on the submit button by using the php function isset 
            and then use the superglobal $_POST. We are then putting each name into a variable
             so we can next push into the database. 



         </p>
        <h4>5 Insert ino database </h4><br>
        <!-- <img src='../images/'  width="200px" alt='Some Text' /><br> -->
         <p>



         </p>
        <h4>Fourth </h4><br>
        <!-- <img src='../images/'  width="200px" alt='Some Text' /><br> -->
         <p>



         </p>
        <h4>Fourth </h4><br>
        <!-- <img src='../images/'  width="200px" alt='Some Text' /><br> -->
         <p>



         </p>
   
</div>






<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.3.2/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>


<?php include 'footerForBlogs.php'; ?>