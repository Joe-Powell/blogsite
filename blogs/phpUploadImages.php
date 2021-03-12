<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/phpUploadImages.css">




<div class="containBlog">




    <!-- -------------------------------------CODE--------------------------------------------------------------------- -->
    <h2>Make form</h2>

    <pre class='thePre'><code class="php"> 
    &lt;form action='index.php' method='post' enctype="multipart/form-data">
    &lt;input type="file" class='file'  name='file'>    
    &lt;input type="submit" class='submitUploadPic' value="submit" name='submitUpload'>
    &lt;/form>

</code></pre>

    <p>
        First make a form and make sure it is a method of post and
        also make sure it as a enctype attribute for it to work.
        make the input type is file so we can catch the file array in the
        isset handler in the next snippet below.
    </p>
    <!-- -------------------------------------------------------------------------------------------------------------- -->

    <h2>Handle submission of form</h2>
    <pre class='thePre'><code class="php"> 
    if(isset($_POST['submitUpload'])) {
        $fileTmp=$_FILES['file']['tmp_name'];
        $fileName=$_FILES['file']['name'];
        $folder = "images/".$fileName;

        $sql = "INSERT INTO table_one (uploadfile) VALUES ('$fileName')"; 
        $conn->query($sql);

        if (move_uploaded_file($fileTmp, $folder))  { 
            echo "Image uploaded successfully"; 
        }else{ 
           echo  "Failed to upload image"; 
        } 


    }
    </code></pre>
    <p>We want to catch the information from the file being sent through using the $_FILES Superglobal.
        After putting the tmp name and name of the file into variables, we then insert the fileName into the database,
        make sure there is a column to catch the filename in the database. Once the filenamee is pushed into the database,
        we then use the PHP's move_uploaded_file method to push the uploaded file into a folder we created called images.
        The move_uploaded_file function has two parameters first is the fileTmp which is it's temporary name, then the folder you want to put it inside with its new name.


    </p>


    <!-- -------------------------------------------------------------------------------------------------------------- -->



    <h2>Get the uploaded image into the webpage</h2>
    <pre class='thePre'><code class="php"> 
    $sql = "SELECT * FROM table_one ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    while($row = $result->fetch_assoc()) {
    echo "&lt;img src='./images/".$row['uploadfile']." '>";
       
  
    }
    </code></pre>
    <p>
        Ok let's put these lines of code will select the column we made in the database table
        and whenever the page loads it will query from the database and show the images into the web page.

    </p>




</div>









<?php include 'footerForBlogs.php'; ?>