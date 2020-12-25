<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/phpCrudOperations.css">















<div class="containBlog">
    <h2 class='heading'><i class="fab fa-php"></i> PHP CRUD Operations </h2>
    <!-- ---------------------------------------------------- -->

    <h2>Create, with INSERT INTO table </h2>

    <pre class='thePre'><code class="php"> 

if(isset($_POST['submit'])) {
    $post = $_POST['post'];
    $query =  "INSERT INTO tableName (post)
     VALUES ('$post')";
    $conn->query($query);
    }

</code></pre>

    <p>When the form is submitted, this is how we catch the post and insert it into the database.



    </p>
    <!-- ---------------------------------------------------- -->


    <h2>Read, with SELECT * FROM table </h2>

    <pre class='thePre'><code class="php"> 
$sql = "SELECT * FROM tableName ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

while($row = $result->fetch_assoc()) {
  echo "&lt;p>".$row['post']."&lt;/p>";
 }
</code></pre>

    <p>Select from the database and create a while loop to push
        all records into the web page whenever the page loads.



    </p>
    <!-- ---------------------------------------------------- -->


    <h2>Update, with UPDATE table SET post WHERE</h2>

    <pre class='thePre'><code class="php">
// put this form in with the while loop from SELECT * FROM TABLE and make the css display none
// create a button that says edit so you can toggle this form to display block with javaScript.
    
    &lt;form class='updateForm' action='index.php' method='post'>
        &lt;input type='hidden' name='the_id' value='".$row['id']."'>
        &lt;input type='text' class='postToEdit' name='postToEdit' value='".$row['post']."'>
        &lt;button type='submit' name='update' class='updateBtn' >Update&lt;/button>
    &lt;/form>
 
     
    &lt;button type='button' class='editBtn'>EDIT&lt;/button>


    if(isset($_POST['update'])) {
        $postToEdit = $_POST['postToEdit'];
        $the_id = $_POST['the_id'];
        $query =  "UPDATE tableName SET post='$postToEdit' WHERE id='$the_id' ";
        $conn->query($query);
     }
</code></pre>

    <p>We send an input with a hidden id to catch and then run a query to
        update the original post in the database where the id matches.




    </p>
    <!-- ---------------------------------------------------- -->



    <h2>Delete, with DELETE FROM table WHERE id </h2>

    <pre class='thePre'><code class="php">
    // put this form also in the with the while loop from SELECT * FROM TABLE 
    &lt;form class='deleteForm' action='index.php' method='post'>
        &lt;input type='hidden' name='the_id' value='".$row['id']."'>
        &lt;button type='submit' name='delete' class='deleteBtn'>Delete&lt;/button>
    &lt;/form>

    if(isset($_POST['delete'])) {
        $the_id = $_POST['the_id'];
        $query = "DELETE FROM tableName WHERE id = '$the_id'";
        $conn->query($query);

        $sql = "SELECT * FROM table_one ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }
</code></pre>

    <p>
        Create another form with a hidden input that holds the post id as its value.
        When the user submits the form it gets cathed in index.php and runs a query
        to delete it from the database.


    </p>
    <!-- ---------------------------------------------------- -->





</div>

<?php include 'footerForBlogs.php'; ?>