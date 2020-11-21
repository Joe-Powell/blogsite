<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/hostYourReactProject.css">


<!-- <div class="image" alt='ReactHostinng'></div> -->
<h1 class='intro'>Host your React project on a shared hosting in five steps</h1><br>

<div class="containBlog">
    
         


     
     <p> <i class="fab fa-react"></i> 
       
         <img src='../images/hostreact.PNG'   height="100px" alt='Some Text' /><br>
         <h4>First </h4><br>
        Start out by going to package.json and add a homepage property with value.
        The value needs to be the websites domain name and as you can see the slash
         indicates which folder if it's a subdomin.

      </p><br>

     <p>
       
        <img src='../images/runBuild.PNG'   width='200px' alt='Some Text' /><br> 
        <h4>Second </h4><br>
        In the command line make sure you ctrl c out of the app if it is running and go to the root folder.
        then simply type in <b>npm run build</b> then hit enter. this may take a few moments to run 
        then your build folder will be complete. go to next step.<br><br>
        <img src='../images/findBuild.PNG'  width="100px" alt='Some Text' /> 
        <img src='../images/selectBuild.PNG'  width="200px" alt='Some Text' /><br>
        <h4>Third </h4><br>
         Go to file explorer, find that <b>build</b> folder which is inside the root folder of 
         your react project and go inside the build folder. Select all the files and folders 
        inside it by holding in the right click and hover over them. release the right click and select send to.
         <br> 
                



      </p><br>

     <p>
        
        <img src='../images/sendToZip.PNG'  width="300px" alt='Some Text' /><br>
        <h4>Fourth </h4><br>
        Your going to need to export those files and folders you just highlighted with a zip folder
        so select send to compressed zip folder like the picture above shows. and then your ready to
         extract them into your shared hosting
      
     </p><br>

     <p>
       
        <img src='../images/extractZip.PNG'  width="200px" alt='Some Text' /><br>
        <h4>Finally</h4><br>Go to your hosting and find the folder you want to upload it to, choose upload,
         then pick that zip folder and upload it, right click
          on the zip thats been uploaded inside the host and select <b>extract</b> happy coding :)
         
      </p>
   
        
        
        

  
     
     
</div>









<?php include 'footerForBlogs.php'; ?>