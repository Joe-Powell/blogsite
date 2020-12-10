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









