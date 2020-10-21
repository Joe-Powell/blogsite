<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/connectToMongodb.css">


<div class="image" alt='mongoDB'></div>

<div class="containBlog">
    
     
     <p><h4>First </h4> make database in atlas is step one</p>
     <p><h4>Second </h4> copy the driver from atlas and paste into its own seperate file inside a folder to make secure.
         Make sure to export it.</p>
     <p><h4>Third </h4> import driver into your server file usually called app.js and put it's variable name inside mongoose.connect() paremeter</p>
     <p><h4>Fourth </h4> create another folder with a file in it to make your new Schema. A schema is a model of what 
        to push into your mongoBD before sending.   </p>
     <p><h4>Finally </h4> tell the model method to push the schema into the database collection. this model function takes two 
        parameters, the first is the name of the collection, the second is the name of the schema.</p>
  
     
     
    
    
    

 
   

   
  
</div>
<?php include 'footerForBlogs.php'; ?>