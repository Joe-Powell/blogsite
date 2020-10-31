<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/connectToMongodb.css">


<div class="image" alt='mongoDB'></div>

<div class="containBlog">
    
     
     <p>
        <h4>First </h4><br><img src='../images/createDatabase.PNG' width="200px" alt='database connection'/><br> Create a database and a collection in mongobd.com
      </p><br>

     <p>
        <h4>Second </h4><br> <img src='../images/connCluster.PNG' width="300px" /><br> Copy the driver to mongoDB and paste into its own seperate file called .env.
         In the commmand line type npm i mongoose env dotenv. At the top of app.js or server, make sure to simply add the require('dotenv/config') for the dotenv to work.
         You will find this by clicking on clusters, click connect, then click Connect your application.
         Make sure to put your password and database name in the driver code. 
      </p><br>

     <p>
        <h4>Third </h4><br>
        <img src='../images/mongooseConnect.PNG' alt='connect to mongoose' /><br> 
        Inside your server file usually called app.js or server.js, put your driver 
        variable into your mongoose .connect(process.env.DB_CONN,). The second parameter will be an object with some things that resolve depreciation errors.
     </p><br>

     <p>
        <h4>Fourth </h4><br>
        <img src='../images/schemaAndModel.PNG' width="300px" height="200px" /><br> 
         Create another folder called schema with a file in it called model. A schema is used to configure your entries that will then get pushed into the collection.
         In the image above the collection is called inputs and the model is in a variable called Inputs.  
		   The model method, which is below the schema is a function used to push the schema into the database collection. This model function takes two 
         parameters, the first is the name of the collection, the second is the name of the schema.
         Finally, require the exported model variable into your routes and then use it to make queries.   
      </p>
   
        
        
        

  
     
     
</div>









<?php include 'footerForBlogs.php'; ?>