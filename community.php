<?php include './header.php'; ?>
<link rel="stylesheet" href="./css/community.css">



<?php
    
    require './Database/DB_CONN.php';
   
    

////  POST COMMENT   /////////////////////////////////////////////////////////////////////////
    if(isset($_POST['submitComment'])) {
        $comment = $_POST['comment'];
        $userid = $_POST['userid'];

     

 if( empty($comment)) {
        
            $message='please add comment';


        }else{
        
            $sqlUsers="SELECT * FROM users WHERE id ='$userid' ";
            $result = $conn->query($sqlUsers);
            $Theuser =  $result->fetch_assoc();   

            $name= $Theuser['username']; // get username from users table to put in every post 


         $sql= "INSERT INTO comment_table (comment, userid, name) VALUES ('$comment','$userid', '$name')";
         $result = $conn->query($sql);


    
        }

    }  

/////////////////////////////////////////////////////////////////////////////////////////////







///////////////UPDATE ////////////////////////////////////////////////////////////////////
    if(isset($_POST['submitUpdateBtn'])) {
        $updateValue = $_POST['update'];
        $thePostIdToUpdate = $_POST['thePostIdToUpdate'];

        $sql = "UPDATE comment_table SET comment='$updateValue' WHERE id='$thePostIdToUpdate' ";
         $conn->query($sql);    
        


    }
    
 ///////////////////////////////////////////////////////////////////////////////////////////
 





 
 //////////DELETE   vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv

if(isset($_POST['delete'])) {
 $thePostIdToUpdate= $_POST['thePostIdToUpdate'];

$sql = "DELETE  FROM comment_table Where id = '$thePostIdToUpdate' ";
 $conn->query($sql);  





}




 //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^



?>


<!-- NOTE FOR TUTORIAL a footprint of $_session[id] will be made in a hidden input on submission.
We named it  name='userid'  value='<?php// echo $_SESSION['uid'] ?>'. on submission it goes into database.
then below where we catch it from the select query, we have to remember there is a userid column 
in the database tht we can compare and make an if statement with php to display the edit button.
so we say, if the current _$session['uid'] == $comments['userid'] then display edit button
 -->

<?php if(isset($_SESSION['uid'])) { ?>
    <div class='commentForm'>
<h2>Comments/questions</h2>
    <form id='Form' action='community.php' method='post'>
        <input class='commentField' type='text' name='comment'>
        <input type='hidden' name='userid' value='<?php echo $_SESSION['uid'] ?>'>
        <input class='submitCommentBtn' type='submit' name='submitComment' value='Submit'>
    </form>
</div>

    <?php }  ?>

<div class='commentsContainerAll'>
<?php
 require './Database/DB_CONN.php';
 $sql = "SELECT * FROM comment_table";
 $result = $conn->query($sql) ;
 $comments = $result->fetch_assoc(); 

while($comments = $result->fetch_assoc()) { ?>
<div class='commentContainer'>
<input type='hidden' value='<?php echo mt_rand() ?>'>
    <h3><?php echo $comments['name']; ?></h3><br><br>
    <p><?php echo $comments['comment']; ?></p>
    <p class='date'><?php echo $comments['date']; ?></p>

    <?php if(isset($_SESSION['uid']) && $_SESSION['uid'] == $comments['userid']) { ?>
        <h4 class='editCommBtn'>Edit</h4>
    <?php }  ?>

        <!-- This is the update form with the post id hidden and comment to update -->

    <form id='commEditForm' class='toggleForm' action='community.php' method='post' > 
        <i class="far fa-times-circle"></i>
        <input type='hidden' name='thePostIdToUpdate' value='<?php echo $comments['id']; ?>'>
        <input class='updateInputField' name='update' type='text' value='<?php echo $comments['comment']; ?>'> 
        <input class='submitUpdateBtn' type='submit' name='submitUpdateBtn' value='Update'>
        <input  name='delete' type='submit' class='deletePostBtn' value='Delete'></button>
    </form> 

</div>   
<?php } ?>

</div>




<script src='communityJavascript.js' ></script>
<?php include 'footer.php'; ?>