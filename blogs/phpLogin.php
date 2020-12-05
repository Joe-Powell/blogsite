




<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/phpLogin.css">


<div class="image" alt='#'></div>

<div class="containBlog">
    <h2 class='heading'><i class="fab fa-php"></i> Login/Registration system with PHP </h2>
    <h2>1 Create a database </h2>
        <img src='../images\databasephp.PNG'  width="300px" alt='Some Text' />

        <p>
            in the url type in localhost/phpmyadmin. From there create a database, a table named users, the columns
            such as id, username, email, password. this will catch the fields from registration. 
        </p><br>
        <h2>2 connect to the server </h2>
        <pre class='thePre'><code class="html">   
        &lt;?php
            $servername = "localhost";
            $username = "root";
            $password = "123123";
            $db = 'php_login_DB';
            $conn = new mysqli($servername, $username, $password, $db);
        ?>
    </code></pre>
        <p>
            Create a folder and file to store your database crudentials. With mysqli your going to need to 
            enter the host, user, password, and database name. When needed you will then require it in.
        </p>



     
        <h2>3 Create registration form with attributes to submit </h2>
            
    <pre class='thePre'><code class="html">   
       &lt;form class='registerForm' action='index.php' method='post'>
        &lt;h2 >Register&lt;/h2>
        &lt;input type="email" id= "email" name='email' >
        &lt;input type="text" id="username" name='username' placeholder="username" >
        &lt;input type="password" id="password" name='password' placeholder="Password" >
        &lt;button type="submit"  name='submitRegistration'>Submit&lt;/button>
    &lt;/form>
    
    </code></pre>
      <p>
        make sure there is a method and an action of post. 
        make sure the inputs and button you want to grab have the name attributes 
        so you can get the value from them in php after you submit the form.

      </p>

     
        <h2>4 Handle submission of registration and insert new user into database </h2>

        <pre class='thePre'><code class="php">   
    
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
       
       </code></pre>


         <p>
            Since we are submitting the form to index.php in here, we will handle the submission
            by first opening some php tags on top of the page above the DOCTYPE html declaration
             in index.php and make an if else statement. Inside the condition we want to check
            for a click on the submit button by using the php function isset 
            and then use the superglobal $_POST. We are then putting each name into a variable
             so we can next push into the database. I am using minimum validation here to just focus on 
             the raw code of building a login / registration system. As long as the user does not exist,
             the user will be created because we are using the mysqli_num_rows() function to check. 
        </p>
        <h2>5 Create the Login form</h2><br>

    <pre class='thePre'><code class="html">   
 &lt;form class='loginForm' action='index.php' method='post'>
    &lt;h2>Login&lt;/h2>
    &lt;input type="text" id="username" name='username'>
    &lt;input type="password"  id="password" name='password' placeholder="Password">
    &lt;button type="submit" class="btn btn-primary" name='submitLogin'>Submit&lt;/button>   
 &lt;/form>
    </code></pre>


        
         <p>



         </p>
        <h2>6 Handle the submission of login  </h2><br>

    <pre class='thePre'><code class="php"> 
    &lt;?php session_start();       
 if(isset($_POST['submitLogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if( empty($username) || empty($password)) {
        $message = "Please fill all fields";
    }
    $query = "SELECT * FROM users
    WHERE username='$username' AND password='$password' ";
    $result = $conn->query($query);  
    $user =  $result->fetch_assoc();

    if(mysqli_num_rows($result) === 1) {
        $_SESSION['uid'] = $user['id'];
    }
}


>
</code></pre>
        
         <p>



         </p>
        <h2>Fourth </h2><br>
        <!-- <img src='../images/'  width="200px" alt='Some Text' /><br> -->
         <p>
        The superglobal $_POST is waiting for the submitLogin button to be clicked and then 
        makes sure the fields are filled out. The query checks if the users table has one row
         with the same username and password as was entered into the fields that were submitted.
         Then we fetch the result as an associative array and make a $_SESSION = the users id
         of that user of that row in the database. 


         </p>
   
</div>






<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.3.2/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>


<?php include 'footerForBlogs.php'; ?>