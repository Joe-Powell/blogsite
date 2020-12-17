<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/phpLogin.css">


<div class="image" alt='#'></div>

<div class="containBlog">
    <h2 class='heading'><i class="fab fa-php"></i> Login Registration system with PHP </h2>
    <h2>1 Create a database </h2>
    <img src='../images\databasephp.PNG' width="300px" alt='Some Text' />

    <p>
        in the url type in localhost/phpmyadmin. From there create a database, a table named users, the columns
        such as id, username, email, password. this will catch the fields from registration.
    </p><br>
    <h2>2 connect to the server </h2>
    <pre class='thePre'><code class="html">   
&lt;?php
    $servername = "localhost";
    $user = "root";
    $password = "123123";
    $db = 'php_login_DB';
    $conn = new mysqli($servername, $user, $password, $db);
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
    &lt;button type="submit" id='submitRegistration' name='submitRegistration'>Submit&lt;/button>
&lt;/form>

</code></pre>
    <p>
        make sure there is a method and an action of post unless your using fetch, axios or ajax.
        make sure the inputs and button you want to grab have the name attributes
        so your your api can get the value after you submit the form.

    </p>

    <h2>4 Handle submission of registration and insert new user into database as long as crudentials do not already exist within </h2>

    <pre class='thePre'><code class="php">   
    &lt;?php  session_start();
    if(isset($_POST['submitRegistration'])) {
        require './conn/db.php';
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
w   if(empty($email) || empty($username) || empty($password)) {
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
        In index.php, we will handle the submission of the register form.
        Inside the condition we want to check for a click on the submit button by using the php function isset().
        We are then putting each input value into a variable holding the value of the superglobal of $_POST.
        As long as the username or email does not exist in the database, the new user will be created by using the
        INSERT query.
    </p>
    <h2>5 Create the Login form</h2>

    <pre class='thePre'><code class="html">   
 &lt;form class='loginForm' action='index.php' method='post'>
    &lt;h2>Login&lt;/h2>
    &lt;input type="text" id="username" name='username'>
    &lt;input type="password" id="password" name='password' placeholder="Password">
    &lt;button type="submit" name='submitLogin'>Submit&lt;/button>   
 &lt;/form>
    </code></pre>
    <p>

    </p>
    <h2>6 Handle the submission of login </h2>
    <pre class='thePre'><code class="html"> 
    &lt;?php session_start();       
 if(isset($_POST['submitLogin'])) {
    require './conn/db.php';
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
?>
</code></pre>


    <h2></h2><br>

    <p>
        The superglobal $_POST is waiting for the submitLogin button to be clicked and then
        makes sure the fields are filled out. The query checks if the users table has exactly one row
        with the same username and password.
        We then fetch the result as an associative array and make a $_SESSION = the users id
        of that user in the database. The session is created so we can give users access to things
        like an edit button if they are the one that originally left that post and so on.
        we can also make the logout button appear if logged in. This session superglobal is the basis of the
        whole being logged in concept. There must be a session_start() function at the top of each page using the
        session. I often put it in my header.php page



    </p>


    <h2> To give access to logged in users, make edit button available for logged in user, and make other
        things avilable to users logged in we ise the if statement. </h2><br>
    <pre class='thePre'><code class="html"> 
&lt;?php if(isset($_SESSION['uid']) && $_SESSION['uid'] == $user['inputId']) { ?>
   &lt;button  class='editBtn'>Edit&lt;/button>
&lt;?php }  ?>
</code></pre><br>




    <h2>Leave an ID footprint where user posts a comment for later editing and accessing </h2>
    <pre class='thePre'><code class="html">  
&lt;?php if(isset($_SESSION['uid'])) { ?>
    &lt;h2>Comments/questions&lt;/h2>
    &lt;form id='Form' action='index.php' method='post'>
    &lt;input class='comment' type='text' name='comment'>
    &lt;input type='hidden' name='userid' value='&lt;?php echo $_SESSION['uid'] ?>'>
    &lt;input class='submitComment' type='submit' name='submitComment' value='Submit'>
    &lt;/form>

    &lt;?php }  ?>
    </code></pre><br>

    <!-- <h2>Handle submission </h2> -->
    <pre class='thePre'><code class="php">  

if(isset($_POST['submitComment'])) {
        $comment = $_POST['comment'];
        $userid = $_POST['userid'];
        $sql= "INSERT INTO comment_table (comment, userid) VALUES ('$comment','$userid')";
         $result = $conn->query($sql);

    }


</code></pre>
    <p>
        Notice there is a hidden input type='hidden' with a value of the $_SESSION['uid'].
        this input is loaded and will fire into a database table column usually called uid.
        On submission of this post, this way each post will have a record of who made the post.
        then you can see the handling of submitting this and the query made into the other table for posts.
    </p><br>



    <h2>How the posts are displayed on the page </h2>
    <pre class='thePre'><code class="php">  
    &lt;?php
    require './conn/db.php';
    $sql = "SELECT * FROM comment_table";
    $result = $conn->query($sql) ;
    $comments = $result->fetch_assoc(); 

    while($comments = $result->fetch_assoc()) { ?>
        &lt;div class='commentContainer'>
        &lt;p>&lt;?php echo $comments['userid']; ?>&lt;/p>
        &lt;p>&lt;?php echo $comments['comment']; ?>&lt;/p>

        &lt;?php if(isset($_SESSION['uid']) && $_SESSION['uid'] == $comments['userid']) { ?>
        &lt;h4 class='editCommBtn'>Edit&lt;/h4>
        &lt;?php }  ?>

        &lt;form id='commEditForm' class='toggleForm'> 
        &lt;i class="far fa-times-circle">&lt;/i>
        &lt;input class='update' name='update' type='text' value='&lt;?php echo $comments['comment']; ?>'> 
        &lt;input type='submit' value='Update'>
        &lt;/form> 

        &lt;/div>   
        &lt;?php } ?>

 </code></pre>
    <p>
        First we run another query, SELECT all from the table, then make a while loop that will print all
        rows selected in p tags. If there is a user logged in, then there will be an edit button visable for their posts.
        I used an h4 tag on this edit button because I actually used fetch to submit it, with a javascript onclick event handler .
        If nobody is logged in, all posts are still visible because it's a public site they just cant post or edit their post unlesslogged in.
        There is also an update form which in css it is set to display none, every post has this form update as display none
        and using javascript you can make it display= 'block' or toggle class.
    </p>




    <h2>Use Prepared Statements for your insertions. Now that you know the basics you can make your
        site more secure </h2>
    <pre class='thePre'><code class="php">  
    //Object-oriented
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",  $username, $email, $password);
    $res = $stmt->execute();

    //Procedural
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password); 
    mysqli_stmt_execute($stmt);


    //OOP
    $sql = "SELECT * FROM users WHERE username =? AND password=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss",  $username, $password);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    $user =  $result->fetch_assoc();

    //Procedural
    $sqlUsers = "SELECT * FROM users WHERE id =? ";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user =  $result->fetch_assoc();

    

</code></pre>





</div>







<?php include 'footerForBlogs.php'; ?>