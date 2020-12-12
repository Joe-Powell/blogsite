<?php include './header.php'; ?>
<link rel="stylesheet" href="./css/community.css">



<?php
    
    require './Database/DB_CONN.php';
    
    if(isset($_POST['comment'])) {
        $comment = $_POST['comment'];
        $userid = $_POST['userid'];

     

 if( empty($comment)) {
        
            $message='please add comment';


        }else{
        

         $sql= "INSERT INTO comment_table (comment, userid) VALUES ('$comment','$userid')";
         $result = $conn->query($sql);


    
        }

    }     


?>


<!-- NOTE FOR TUTORIAL a footprint of $_session[id] will be made in a hidden input on submission.
We named it  name='userid'  value='<?php// echo $_SESSION['uid'] ?>'. on submission it goes into database.
then below where we catch it from the select query, we have to remember there is a userid column 
in the database tht we can compare and make an if statement with php to display the edit button.
so we say, if the current _$session['uid'] == $comments['userid'] then display edit button
 -->

<?php if(isset($_SESSION['uid'])) { ?>
<h2>Comments/questions</h2>
    <form id='Form'>
        <input class='comment' type='text' name='comment'>
        <input type='hidden' name='userid' value='<?php echo $_SESSION['uid'] ?>'>
        <input class='submitComment' type='submit' name='submitComment' value='Submit'>
    </form>

    <?php }  ?>





   

<div class='commentsContainerAll'>
<?php
 require './Database/DB_CONN.php';
 $sql = "SELECT * FROM comment_table";
 $result = $conn->query($sql) ;
 $comments = $result->fetch_assoc(); 

while($comments = $result->fetch_assoc()) { ?>
<div class='commentContainer'>
    <p><?php echo $comments['userid']; ?></p>
    <p><?php echo $comments['comment']; ?></p>

    <?php if(isset($_SESSION['uid']) && $_SESSION['uid'] == $comments['userid']) { ?>
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